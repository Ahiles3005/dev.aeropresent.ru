<?define("STATISTIC_SKIP_ACTIVITY_CHECK", "true");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(!\Bitrix\Main\Loader::includeModule("sale") || !\Bitrix\Main\Loader::includeModule("catalog") || !\Bitrix\Main\Loader::includeModule("iblock") || !\Bitrix\Main\Loader::includeModule("aspro.max"))
{
	echo "failure";
	return;
}
$addResult = [];

if(isset($_REQUEST["type"]) && $_REQUEST["type"] == "multiple")
{
	$successfulAdd = true;
	$strError = $strErrorExt = '';
	$arRewriteFields = $product_properties = [];

	$context = \Bitrix\Main\Context::getCurrent();
	$request = $context->getRequest();

	if($request["action"] && $request["items"])
	{
		$arBasketItems = [];
		$rsItems = CSaleBasket::GetList(
			array("NAME" => "ASC", "ID" => "ASC"),
			array("PRODUCT_ID" => array_keys($request["items"]), "FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
			false, false, array("ID", "PRODUCT_ID", "DELAY", "QUANTITY")
		);
		while($arBasketItem = $rsItems->Fetch())
		{
			$arBasketItems[$arBasketItem["PRODUCT_ID"]]["ID"] = $arBasketItem["ID"];
			$arBasketItems[$arBasketItem["PRODUCT_ID"]]["DELAY"] = $arBasketItem["DELAY"];
			$arBasketItems[$arBasketItem["PRODUCT_ID"]]["QUANTITY"] = $arBasketItem["QUANTITY"];
		}
		
		if($request["action"] == "buy") //buy items
		{
			foreach($request["items"] as $arItem)
			{
				if($arItem["product_type"] != 3 || $arItem['add_offer'] == 'Y') // not sku
				{
					if($arBasketItems[$arItem["id"]])
					{
						$quantity = $arItem["quantity"] + $arBasketItems[$arItem["id"]]["QUANTITY"];
						$arFields = array("DELAY" => "N", "SUBSCRIBE" => "N", "QUANTITY" => $quantity);
						CSaleBasket::Update($arBasketItems[$arItem["id"]]["ID"], $arFields);
					}
					else
					{
						if(!Add2BasketByProductID($arItem["id"], $arItem["quantity"], $arRewriteFields, $product_properties))
						{
							if($ex = $APPLICATION->GetException())
							{
								$strErrorExt .= '<br>'.$ex->GetString();
							}
							
							$strError = "ERROR_ADD2BASKET";
							$successfulAdd = false;
						}
					}
				}
			}
		}
		elseif($request["action"] == "wish") //delay items
		{
			$arDelayId = array();
			foreach($request["items"] as $arItem)
			{
				if($arItem["product_type"] != 3) // not sku
				{
					if($arBasketItems[$arItem["id"]] && $arBasketItems[$arItem["id"]]["DELAY"] == "N")
					{
						$arFields = array("DELAY" => "Y", "SUBSCRIBE" => "N", "QUANTITY" => $arItem["quantity"]);
						CSaleBasket::Update($arBasketItems[$arItem["id"]]["ID"], $arFields);
						$arDelayId[] = $arItem["id"];
					}
					else
					{
						if(!$id = Add2BasketByProductID($arItem["id"], $arItem["quantity"], $arRewriteFields, $product_properties))
						{
							if($ex = $APPLICATION->GetException())
							{
								$strErrorExt .= '<br>'.$ex->GetString();
							}
							
							$strError = "ERROR_ADD2BASKET";
							$successfulAdd = false;
						}

						if($id)
						{
							$arFields = array("DELAY" => "Y", "SUBSCRIBE" => "N");
							CSaleBasket::Update($id, $arFields);
						}
					}
				}
			}
			if( is_array($arDelayId) && count($arDelayId) > 0 ){
				CMax::deleteBasketServices($arDelayId);
			}
		}
		elseif($request["action"] == "compare") //compare items
		{
			$iblock_id = $request["iblock_id"];
			foreach($request["items"] as $arItem)
			{
				$_SESSION["CATALOG_COMPARE_LIST"][$iblock_id]["ITEMS"][$arItem["id"]] = CIBlockElement::GetByID($arItem["id"])->Fetch();
			}
		}
	}

	if ($successfulAdd)
		$addResult = array('STATUS' => 'OK', 'MESSAGE' => 'SUCCESSFUL_ADD', 'MESSAGE_EXT' => $strErrorExt);
	else
		$addResult = array('STATUS' => 'ERROR', 'MESSAGE' => $strError, 'MESSAGE_EXT' => $strErrorExt);
}
else
{	
	if(!empty($_REQUEST["add_item"]))
	{
		if($_REQUEST["add_item"] == "Y")
		{
			if($_REQUEST["quantity"])
				$_REQUEST["quantity"] = floatval($_REQUEST["quantity"]);

			$product_properties=$arSkuProp=array();
			$successfulAdd = true;
			$strErrorExt='';

			$dbBasketItems = CSaleBasket::GetList(
				array("NAME" => "ASC", "ID" => "ASC"),
				array("PRODUCT_ID" => $_REQUEST["item"], "FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
				false, false, array("ID", "DELAY")
			)->Fetch();
			if(!empty($dbBasketItems) && $dbBasketItems["DELAY"] == "Y")
			{
				$arFields = array("DELAY" => "N", "SUBSCRIBE" => "N");
				if($_REQUEST["quantity"])
					$arFields['QUANTITY'] = $_REQUEST["quantity"];
				CSaleBasket::Update($dbBasketItems["ID"], $arFields);
			}
			else
			{
				$intProductIBlockID = (int)CIBlockElement::GetIBlockByID($_REQUEST["item"]);
				if(0 < $intProductIBlockID)
				{			
					if($_REQUEST["add_props"]=="Y"){
						$arSkuProp=json_decode($_REQUEST["props"]);
						if ($intProductIBlockID == $_REQUEST["iblockID"])
						{
							if($_REQUEST["props"])
							{
								$product_properties = CIBlockPriceTools::CheckProductProperties(
									$_REQUEST["iblockID"],
									$_REQUEST["item"],
									$arSkuProp,
									$_REQUEST["prop"],
									$_REQUEST['part_props'] == 'Y'
								);
								
								if (!is_array($product_properties))
								{
									$strError = "CATALOG_PARTIAL_BASKET_PROPERTIES_ERROR";
									$successfulAdd = false;
								}
							}else
							{
								$strError = "CATALOG_EMPTY_BASKET_PROPERTIES_ERROR";
								$successfulAdd  = false;
							}
						}else
						{
							$skuAddProps = (isset($_REQUEST['basket_props']) && !empty($_REQUEST['basket_props']) ? $_REQUEST['basket_props'] : '');
							if ($arSkuProp || !empty($skuAddProps))
							{
								$product_properties = CIBlockPriceTools::GetOfferProperties(
									$_REQUEST["item"],
									$_REQUEST["iblockID"],
									$arSkuProp,
									$skuAddProps
								);
							}
						}
					}			
				}else
				{
					$strError = 'CATALOG_ELEMENT_NOT_FOUND';
					$successfulAdd = false;
				}
				if($successfulAdd)
				{
					$bNeedAddAction = true;
					if(isset($_REQUEST["prop"]['ASPRO_BUY_PRODUCT_ID']) && $_REQUEST["prop"]['ASPRO_BUY_PRODUCT_ID']>0){
						$product_properties[] = array("NAME" => 'link_id', "CODE" => 'ASPRO_BUY_PRODUCT_ID', 'VALUE' => htmlspecialcharsEx($_REQUEST["prop"]['ASPRO_BUY_PRODUCT_ID']));

						//need for sort in admin
						$dbBasketItemParent = CSaleBasket::GetList(
							array("NAME" => "ASC", "ID" => "ASC"),
							array("PRODUCT_ID" => $_REQUEST["prop"]['ASPRO_BUY_PRODUCT_ID'], "FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
							false, false, array("ID", "DELAY", "SORT")
						)->Fetch();
						if(!empty($dbBasketItemParent) && isset($dbBasketItemParent["SORT"]))
						{
							$arRewriteFields = array("SORT" => $dbBasketItemParent["SORT"] );
						}
						/////
						if(empty($dbBasketItemParent)){
							$strError = 'PARENT_ITEM_NOT_FOUND';
							$successfulAdd = false;
							$bNeedAddAction = false;
						}
					}

					if($bNeedAddAction && !Add2BasketByProductID($_REQUEST["item"], $_REQUEST["quantity"], $arRewriteFields, $product_properties))
					{
						if ($ex = $APPLICATION->GetException())
							$strErrorExt = $ex->GetString();
						
						$strError = "ERROR_ADD2BASKET";
						$successfulAdd = false;
					}


					/*add_services*/
					if(!empty($_REQUEST["services"])) //buy items
					{
						$product_properties_services = array();
						if( isset($_REQUEST["services"][0]) && $_REQUEST["services"][0]["id"] >0 ){
							$product_properties_services = CIBlockPriceTools::CheckProductProperties(
								$_REQUEST["services"][0]["iblock_id"],
								$_REQUEST["services"][0]["id"],
								array("BUY_PRODUCT_PROP"),
								array("BUY_PRODUCT_PROP" => htmlspecialcharsEx($_REQUEST["item"])),
								'Y'
							);
							$product_properties_services = is_array($product_properties_services) ? $product_properties_services : array();
						}
						
						$product_properties_services[] = array("NAME" => 'link_id', "CODE" => 'ASPRO_BUY_PRODUCT_ID', 'VALUE' => htmlspecialcharsEx($_REQUEST["item"]));

						//need for sort in admin
						$dbBasketItemParent = CSaleBasket::GetList(
							array("NAME" => "ASC", "ID" => "ASC"),
							array("PRODUCT_ID" => $_REQUEST["item"], "FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
							false, false, array("ID", "DELAY", "SORT")
						)->Fetch();
						if(!empty($dbBasketItemParent) && isset($dbBasketItemParent["SORT"]))
						{
							$arRewriteFields = array("SORT" => $dbBasketItemParent["SORT"] );
						}
						/////						
						
						foreach($_REQUEST["services"] as $arItem)
						{
							if($arItem["id"]) // not empty id
							{								
								if(!Add2BasketByProductID($arItem["id"], $arItem["quantity"], $arRewriteFields, $product_properties_services))
								{
									if($ex = $APPLICATION->GetException())
									{
										$strErrorExt .= '<br>'.$ex->GetString();
									}
									
									$strError = "ERROR_ADD2BASKET";
									$successfulAdd = false;
								}
								
							}
						}
					}
					/**/

				}
			}
			if ($successfulAdd)
				$addResult = array('STATUS' => 'OK', 'MESSAGE' => 'CATALOG_SUCCESSFUL_ADD_TO_BASKET', 'MESSAGE_EXT' => $strErrorExt);
			else
				$addResult = array('STATUS' => 'ERROR', 'MESSAGE' => $strError, 'MESSAGE_EXT' => $strErrorExt);
		}
	}
	elseif(!empty($_REQUEST["subscribe_item"]))
	{
		if($_REQUEST["subscribe_item"] == "Y")
		{
			if(class_exists('\Bitrix\Catalog\Product\SubscribeManager')){
				global $USER, $DB;
				$itemID = intval($_REQUEST['item']);

				$bSubscribeProducts = (isset($_SESSION['SUBSCRIBE_PRODUCT']['LIST_PRODUCT_ID']) && $_SESSION['SUBSCRIBE_PRODUCT']['LIST_PRODUCT_ID']);
				$userId = (($USER && is_object($USER) && $USER->isAuthorized()) ? $USER->getId() : false);
				if($itemID && ($bSubscribeProducts || $userId))
				{
					$subscribeManager = new \Bitrix\Catalog\Product\SubscribeManager;
					$arSubscribeList = CMax::getUserSubscribeList($userId);
					if(!$arSubscribeList[$itemID])
					{
						$contactTypes = $subscribeManager->contactTypes;
						$contactTypeId = key($contactTypes);
						$userContact = $userId ? ($userContact = ($contactTypeId == ($defaultContactTypeId = \Bitrix\Catalog\SubscribeTable::CONTACT_TYPE_EMAIL)) ? $USER->getEmail() : false) : false;

						if($userContact)
						{
							$subscribeData = array(
								'USER_CONTACT' => $userContact,
								'ITEM_ID' => $itemID,
								'SITE_ID' => SITE_ID,
								'CONTACT_TYPE' => $contactTypeId,
								'USER_ID' => $userId,
							);

							$subscribeId = $subscribeManager->addSubscribe($subscribeData);
						}
					}
					else
					{
						if($bSubscribeProducts && !$userId)
						{
							$filter = array(
								'=SITE_ID' => SITE_ID,
								'ITEM_ID' => $itemID,
								'USER_CONTACT' => $_SESSION['SUBSCRIBE_PRODUCT']['LIST_PRODUCT_ID'][$itemID],
								array(
									'LOGIC' => 'OR',
									array('=DATE_TO' => false),
									array('>DATE_TO' => date($DB->dateFormatToPHP(\CLang::getDateFormat('FULL')), time()))
								),
							);

							$resultObject = \Bitrix\Catalog\SubscribeTable::getList(
								array(
									'select' => array(
										'ID',
										'ITEM_ID',
									),
									'filter' => $filter,
								)
							);
							if($arItem = $resultObject->Fetch())
							{
								\Bitrix\Catalog\SubscribeTable::delete($arItem['ID']);
								unset($_SESSION['SUBSCRIBE_PRODUCT']['LIST_PRODUCT_ID'][$itemID]);
							}
						}
						else
						{
							$subscribeManager->deleteManySubscriptions($arSubscribeList[$itemID], $itemID);
						}
					}
				}
				// die();
			}
			else{
				$dbBasketItems = CSaleBasket::GetList(
					array("NAME" => "ASC", "ID" => "ASC"),
					array("PRODUCT_ID" => $_REQUEST["item"], "FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
					false, false, array("ID", "PRODUCT_ID", "SUBSCRIBE", "CAN_BUY")
				)->Fetch();		
				if(!empty($dbBasketItems) && $dbBasketItems["SUBSCRIBE"] == "N")
				{
					$arFields = array("SUBSCRIBE" => "Y", "CAN_BUY" => "N", "DELAY" => "N"); 
					CSaleBasket::Update($dbBasketItems["ID"], $arFields); 
				}
				elseif(!empty($dbBasketItems) && $dbBasketItems["SUBSCRIBE"] == "Y")
				{	
					CSaleBasket::Delete($dbBasketItems["ID"]); 
				}
				else
				{
					$arRewriteFields = array("SUBSCRIBE" => "Y", "CAN_BUY" => "N", "DELAY" => "N");	
					Add2BasketByProductID(intVal($_REQUEST["item"]), 1, $arRewriteFields, array());
				}
			}
		}
	}
	elseif(!empty($_REQUEST["wish_item"]))
	{ 
		if($_REQUEST["wish_item"] == "Y")
		{
			if($_REQUEST["quantity"])
				$_REQUEST["quantity"] = floatval($_REQUEST["quantity"]);
			
			$successfulAdd = true;
			$strErrorExt = '';
			$dbBasketItems = CSaleBasket::GetList(
				array("NAME" => "ASC", "ID" => "ASC"),
				array("PRODUCT_ID" => $_REQUEST["item"], "FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL", "CAN_BUY" => "Y", "SUBSCRIBE" => "N"),
				false, false, array("ID", "PRODUCT_ID", "DELAY")
			)->Fetch();
			if(!empty($dbBasketItems) && $dbBasketItems["DELAY"] == "N")
			{
				$arFields = array("DELAY" => "Y", "SUBSCRIBE" => "N");
				if($_REQUEST["quantity"]){
					$arFields['QUANTITY'] = $_REQUEST["quantity"];
				}
				CSaleBasket::Update($dbBasketItems["ID"], $arFields);
				CMax::deleteBasketServices(array($_REQUEST["item"]));
			}
			elseif(!empty($dbBasketItems) && $dbBasketItems["DELAY"] == "Y")
			{
				CSaleBasket::Delete($dbBasketItems["ID"]); 
			}
			else
			{
				if($_REQUEST["offers"] == "Y" && $_REQUEST["iblockID"])
				{
					$product_properties = $arSkuProp = array();
					$arSkuProp = json_decode($_REQUEST["props"]);
					if($arSkuProp){
						$product_properties = CIBlockPriceTools::GetOfferProperties($_REQUEST["item"], $_REQUEST["iblockID"], $arSkuProp, $skuAddProps);
					}
					$id = Add2BasketByProductID($_REQUEST["item"], $_REQUEST["quantity"], array(), $product_properties);
				}
				else
				{
					$id = Add2BasketByProductID($_REQUEST["item"], $_REQUEST["quantity"]);
				}
				if(!$id)
				{
					if ($ex = $APPLICATION->GetException())
						$strErrorExt = $ex->GetString();
					$successfulAdd=false;
					$strError = "ERROR_ADD2BASKET";
				}
				
				$arFields = array("DELAY" => "Y", "SUBSCRIBE" => "N");		
				CSaleBasket::Update($id, $arFields);
			}
			if($successfulAdd)
				$addResult = array('STATUS' => 'OK', 'MESSAGE' => 'CATALOG_SUCCESSFUL_ADD_TO_BASKET', 'MESSAGE_EXT' => $strErrorExt);
			else
				$addResult = array('STATUS' => 'ERROR', 'MESSAGE' => $strError, 'MESSAGE_EXT' => $strErrorExt);
		}
	}
	elseif(!empty($_REQUEST["compare_item"]))
	{
		$iblock_id = $_REQUEST["iblock_id"];
		if(!empty($_SESSION["CATALOG_COMPARE_LIST"]) && !empty($_SESSION["CATALOG_COMPARE_LIST"][$iblock_id]) && array_key_exists($_REQUEST["item"], $_SESSION["CATALOG_COMPARE_LIST"][$iblock_id]["ITEMS"]))
		{
			unset($_SESSION["CATALOG_COMPARE_LIST"][$iblock_id]["ITEMS"][$_REQUEST["item"]]);
		}
		else
		{
			$_SESSION["CATALOG_COMPARE_LIST"][$iblock_id]["ITEMS"][$_REQUEST["item"]] = CIBlockElement::GetByID($_REQUEST["item"])->Fetch();
		}
	}
	elseif(!empty($_REQUEST["delete_item"]))
	{
		$dbBasketItems = CSaleBasket::GetList(
			array("NAME" => "ASC", "ID" => "ASC"),
			array("PRODUCT_ID" => $_REQUEST["item"], "FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
			false, false, array("ID", "DELAY")
		)->Fetch();
		if(!empty($dbBasketItems)){
			CSaleBasket::Delete($dbBasketItems["ID"]);
			CMax::deleteBasketServices(array($_REQUEST["item"]));
		}
				
	}
	elseif(!empty($_REQUEST['delete_basket_id']))
	{
		$arIDs2Delete = CMax::checkUserCurrentBasketItems($_REQUEST['delete_basket_id']);
		if ($arIDs2Delete) {
			foreach ($arIDs2Delete as $id) {
				CSaleBasket::Delete($id);
			}
	
			if (!empty($_REQUEST['product_id'])) {
				CMax::deleteBasketServices([$_REQUEST['product_id']]);
			}
		}
	}
	elseif(!empty($_REQUEST['update_basket_id']))
	{
		$arIDs2Update = CMax::checkUserCurrentBasketItems($_REQUEST['update_basket_id']);
		if ($arIDs2Update) {
			$arFields = [
				'DELAY' => 'N',
				'SUBSCRIBE' => 'N',
			];
			if ($_REQUEST['quantity']) {
				$arFields['QUANTITY'] = $_REQUEST['quantity'];
			}

			foreach ($arIDs2Update as $id) {
				CSaleBasket::Update($id, $arFields);
			}
		}			
	}
	elseif(!empty($_REQUEST["delete_linked_services"]))
	{
		$deleteId = htmlspecialcharsEx($_REQUEST["delete_linked_services"]) ;
		if(!empty($deleteId))
			CMax::deleteBasketServices(array($deleteId));
	}
}

if($addResult){
	echo \Bitrix\Main\Web\Json::encode($addResult);
} else {
	if(\Bitrix\Main\Loader::includeModule('aspro.max'))
		CMax::clearBasketCounters();
}

\CMain::FinalActions();
die();
?>