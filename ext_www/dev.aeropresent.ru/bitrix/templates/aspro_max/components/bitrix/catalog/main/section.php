<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>
<?

use Bitrix\Main\Loader,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\ModuleManager;

Loader::includeModule("iblock");

global $arTheme, $NextSectionID, $arRegion;
$arPageParams = $arSection = $section = array();
$_SESSION['SMART_FILTER_VAR'] = $arParams['FILTER_NAME'];

$bUseModuleProps = \Bitrix\Main\Config\Option::get("iblock", "property_features_enabled", "N") === "Y";

$APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", (($arTheme["LEFT_BLOCK_CATALOG_SECTIONS"]["VALUE"] == "Y" && !($arTheme['HEADER_TYPE']['VALUE'] == 28 || $arTheme['HEADER_TYPE']['VALUE'] == 29)  ? "N" : "Y")));
?>
<?$APPLICATION->AddViewContent('right_block_class', 'catalog_page ');?>
<?if(CMax::checkAjaxRequest2()):?>
	<div>
<?endif;?>
<div class="top-content-block"><?$APPLICATION->ShowViewContent('top_content');?><?$APPLICATION->ShowViewContent('top_content2');?></div>
<?if(CMax::checkAjaxRequest2()):?>
	</div>
<?endif;?>


<?
//set params for props from module
\Aspro\Functions\CAsproMax::replacePropsParams($arParams);
?>
<?// get current section ID
if($arResult["VARIABLES"]["SECTION_ID"] > 0){
	$arSectionFilter = array('GLOBAL_ACTIVE' => 'Y', "ID" => $arResult["VARIABLES"]["SECTION_ID"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]);
}
elseif(strlen(trim($arResult["VARIABLES"]["SECTION_CODE"])) > 0){
	$arSectionFilter = array('GLOBAL_ACTIVE' => 'Y', "=CODE" => $arResult["VARIABLES"]["SECTION_CODE"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]);
}
$section = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), CMax::makeSectionFilterInRegion($arSectionFilter), false, array("ID", "IBLOCK_ID", "NAME", "DESCRIPTION", "PICTURE", "DETAIL_PICTURE", "UF_SECTION_DESCR", "UF_OFFERS_TYPE", 'UF_FILTER_VIEW', 'UF_LINE_ELEMENT_CNT', 'UF_TABLE_PROPS', 'UF_SECTION_BG_DARK', 'UF_LINKED_BLOG', 'UF_BLOG_BOTTOM', 'UF_BLOG_WIDE', 'UF_BLOG_MOBILE', 'UF_LINKED_BANNERS', 'UF_BANNERS_BOTTOM', 'UF_FILTER_VIEW', 'UF_BANNERS_WIDE', 'UF_BANNERS_MOBILE', $arParams["SECTION_DISPLAY_PROPERTY"], $arParams["SECTION_BG"], "IBLOCK_SECTION_ID", "DEPTH_LEVEL", "LEFT_MARGIN", "RIGHT_MARGIN"));
CMax::AddMeta([
	'og:image' => ($section['PICTURE'] || $section['DETAIL_PICTURE'] ? CFile::GetPath($section['PICTURE'] ?: $section['DETAIL_PICTURE']) : false),
]);

$typeSKU = '';
$bSetElementsLineRow = false;

if ($section) {
	$arSection["ID"] = $section["ID"];
	$arSection["NAME"] = $section["NAME"];
	$arSection["IBLOCK_SECTION_ID"] = $section["IBLOCK_SECTION_ID"];
	$arSection["DEPTH_LEVEL"] = $section["DEPTH_LEVEL"];
	if ($section[$arParams["SECTION_DISPLAY_PROPERTY"]]) {
		$arDisplayRes = CUserFieldEnum::GetList(array(), array("ID" => $section[$arParams["SECTION_DISPLAY_PROPERTY"]]));
		if ($arDisplay = $arDisplayRes->GetNext()) {
			$arSection["DISPLAY"] = $arDisplay["XML_ID"];
		}
	}
	if ($section["UF_LINE_ELEMENT_CNT"]) {
		$arCntRes = CUserFieldEnum::GetList(array(), array("ID" => $section["UF_LINE_ELEMENT_CNT"]));
		if ($arLineCnt = $arCntRes->GetNext()) {
			$arParams["LINE_ELEMENT_COUNT"] = $arLineCnt["XML_ID"];
			$bSetElementsLineRow = true;
		}
	}
	$viewTableProps = 0;
    if ($section['UF_TABLE_PROPS']) {
        $viewTableProps = $section['UF_TABLE_PROPS'];
    }

	$posSectionDescr = COption::GetOptionString("aspro.max", "SHOW_SECTION_DESCRIPTION", "BOTTOM", SITE_ID);
	if(strlen($section["DESCRIPTION"])){
		$arSection["DESCRIPTION"] = $section["DESCRIPTION"];
	}
	if(strlen($section["UF_SECTION_DESCR"])){
		$arSection["UF_SECTION_DESCR"] = $section["UF_SECTION_DESCR"];
	}

	global $arSubSectionFilter;
	$arSubSectionFilter = array(
		"SECTION_ID" => $arSection["ID"],
		"IBLOCK_ID" => $arParams['IBLOCK_ID'],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
        "UF_TAG" => 0
	);
	$iSectionsCount = CMaxCache::CIBlockSection_GetCount(array('CACHE' => array("TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), CMax::makeSectionFilterInRegion($arSubSectionFilter));

	$catalog_available = $arParams['HIDE_NOT_AVAILABLE'];
	if (!isset($arParams['HIDE_NOT_AVAILABLE'])) {
		$catalog_available = 'N';
	}
	if ($arParams['HIDE_NOT_AVAILABLE'] != 'Y' && $arParams['HIDE_NOT_AVAILABLE'] != 'L') {
		$catalog_available = 'N';
	}
	if ($arParams['HIDE_NOT_AVAILABLE'] == 'Y') {
		$catalog_available = 'Y';
	}
	$arElementFilter = array("SECTION_ID" => $arSection["ID"], "ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]);
	if ($arParams["INCLUDE_SUBSECTIONS"] == "A") {
		$arElementFilter["INCLUDE_SUBSECTIONS"] = "Y";
		$arElementFilter["SECTION_GLOBAL_ACTIVE"] = "Y";
		$arElementFilter["SECTION_ACTIVE "] = "Y";
	}
	if ($arParams['HIDE_NOT_AVAILABLE'] == 'Y') {
		$arElementFilter["CATALOG_AVAILABLE"] = $catalog_available;
	}

	$itemsCnt = CMaxCache::CIBlockElement_GetList(array("CACHE" => array("TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), CMax::makeElementFilterInRegion($arElementFilter), array());

	// set offer type & smartfilter view
	$typeTmpSKU = $viewTmpFilter = 0;
	if ($section['UF_OFFERS_TYPE']) {
		$typeTmpSKU = $section['UF_OFFERS_TYPE'];
	}
	if($section['UF_FILTER_VIEW']){
        $viewTmpFilter = $section['UF_FILTER_VIEW'];
    }
	if ($section['UF_LINKED_BLOG']) {
		$linkedArticles = $section['UF_LINKED_BLOG'];
	}
	if ($section['UF_BLOG_BOTTOM']) {
		$linkedArticlesPos = 'bottom';
	}
	if ($section['UF_BLOG_WIDE']) {
		$linkedArticlesRows = $section['UF_BLOG_WIDE'];
	}
	if ($section['UF_BLOG_MOBILE']) {
		$linkedArticlesRowsMobile = $section['UF_BLOG_MOBILE'];
	}
	if ($section['UF_LINKED_BANNERS']) {
		$linkedBanners = $section['UF_LINKED_BANNERS'];
	}
	if ($section['UF_BANNERS_BOTTOM']) {
		$linkedBannersPos = 'bottom';
	}
	if ($section['UF_BANNERS_WIDE']) {
		$linkedBannersRows = $section['UF_BANNERS_WIDE'];
	}
	if ($section['UF_BANNERS_MOBILE']) {
		$linkedBannersRowsMobile = $section['UF_BANNERS_MOBILE'];
	}

	if (!$typeTmpSKU || !$viewTmpFilter || !$arSection["DISPLAY"] || !$bSetElementsLineRow 
		|| !$linkedArticles	|| !$linkedArticlesPos || $linkedArticlesRows || $linkedArticlesRowsMobile
		|| !$linkedBanners	|| !$linkedBannersPos || $linkedBannersRows || $linkedBannersRowsMobile || !$viewTableProps
		) {
		if ($section['DEPTH_LEVEL'] > 1) {
			$sectionParent = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), array('GLOBAL_ACTIVE' => 'Y', "ID" => $section["IBLOCK_SECTION_ID"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false, array("ID", "IBLOCK_ID", "NAME", "UF_OFFERS_TYPE", 'UF_FILTER_VIEW', $arParams["SECTION_DISPLAY_PROPERTY"], "UF_LINE_ELEMENT_CNT", "UF_TABLE_PROPS", "UF_LINKED_BLOG", 'UF_BLOG_BOTTOM', 'UF_BLOG_WIDE', 'UF_BLOG_MOBILE', 'UF_LINKED_BANNERS', 'UF_BANNERS_BOTTOM', 'UF_BANNERS_WIDE', 'UF_FILTER_VIEW', 'UF_BANNERS_MOBILE',));
			if ($sectionParent['UF_OFFERS_TYPE'] && !$typeTmpSKU) {
				$typeTmpSKU = $sectionParent['UF_OFFERS_TYPE'];
			}
			if ($sectionParent['UF_FILTER_VIEW'] && !$viewTmpFilter) {
				$viewTmpFilter = $sectionParent['UF_FILTER_VIEW'];
			}
			if ($sectionParent['UF_LINKED_BLOG'] && !$linkedArticles) {
				$linkedArticles = $sectionParent['UF_LINKED_BLOG'];
			}
			if ($sectionParent['UF_BLOG_BOTTOM'] && !$linkedArticlesPos) {
				$linkedArticlesPos = 'bottom';
			}
			if ($sectionParent['UF_BLOG_WIDE'] && !$linkedArticlesRows) {
				$linkedArticlesRows = $sectionParent['UF_BLOG_WIDE'];
			}
			if ($sectionParent['UF_BLOG_MOBILE'] && !$linkedArticlesRowsMobile) {
				$linkedArticlesRowsMobile = $sectionParent['UF_BLOG_MOBILE'];
			}
			if ($sectionParent['UF_LINKED_BANNERS'] && !$linkedBanners) {
				$linkedBanners = $sectionParent['UF_LINKED_BANNERS'];
			}
			if ($sectionParent['UF_BANNERS_BOTTOM'] && !$linkedBannersPos) {
				$linkedBannersPos = 'bottom';
			}
			if ($sectionParent['UF_BANNERS_WIDE'] && !$linkedBannersRows) {
				$linkedBannersRows = $sectionParent['UF_BANNERS_WIDE'];
			}
			if ($sectionParent['UF_BANNERS_MOBILE'] && !$linkedBannersRowsMobile) {
				$linkedBannersRowsMobile = $sectionParent['UF_BANNERS_MOBILE'];
			}
			if ($sectionParent[$arParams["SECTION_DISPLAY_PROPERTY"]] && !$arSection["DISPLAY"]) {
				$arDisplayRes = CUserFieldEnum::GetList(array(), array("ID" => $sectionParent[$arParams["SECTION_DISPLAY_PROPERTY"]]));
				if ($arDisplay = $arDisplayRes->GetNext()) {
					$arSection["DISPLAY"] = $arDisplay["XML_ID"];
				}
			}
			if ($sectionParent["UF_LINE_ELEMENT_CNT"] && !$bSetElementsLineRow) {
				$arCntRes = CUserFieldEnum::GetList(array(), array("ID" => $sectionParent["UF_LINE_ELEMENT_CNT"]));
				if ($arLineCnt = $arCntRes->GetNext()) {
					$arParams["LINE_ELEMENT_COUNT"] = $arLineCnt["XML_ID"];
					$bSetElementsLineRow = true;
				}
			}
			if ($sectionParent['UF_TABLE_PROPS'] && !$viewTableProps) {
                $viewTableProps = $sectionParent['UF_TABLE_PROPS'];
            }
			

			if ($section['DEPTH_LEVEL'] > 2) {
				if (!$typeTmpSKU || !$viewTmpFilter || !$arSection["DISPLAY"] || !$bSetElementsLineRow  || !$viewTableProps) {
					$sectionRoot = CMaxCache::CIBlockSection_GetList(array('CACHE' => array("MULTI" =>"N", "TAG" => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"]))), array('GLOBAL_ACTIVE' => 'Y', "<=LEFT_BORDER" => $section["LEFT_MARGIN"], ">=RIGHT_BORDER" => $section["RIGHT_MARGIN"], "DEPTH_LEVEL" => 1, "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false, array("ID", "IBLOCK_ID", "NAME", "UF_OFFERS_TYPE", 'UF_FILTER_VIEW', $arParams["SECTION_DISPLAY_PROPERTY"], "UF_LINE_ELEMENT_CNT", "UF_TABLE_PROPS", "UF_LINKED_BLOG", 'UF_BLOG_BOTTOM', 'UF_BLOG_WIDE', 'UF_BLOG_MOBILE', 'UF_LINKED_BANNERS', 'UF_BANNERS_BOTTOM', 'UF_BANNERS_WIDE', 'UF_BANNERS_MOBILE',));
					if ($sectionRoot['UF_OFFERS_TYPE'] && !$typeTmpSKU) {
						$typeTmpSKU = $sectionRoot['UF_OFFERS_TYPE'];
					}
					if ($sectionRoot['UF_FILTER_VIEW'] && !$viewTmpFilter) {
						$viewTmpFilter = $sectionRoot['UF_FILTER_VIEW'];
					}
					if ($sectionRoot['UF_LINKED_BLOG'] && !$linkedArticles) {
						$linkedArticles = $sectionRoot['UF_LINKED_BLOG'];
					}
					if ($sectionRoot['UF_BLOG_BOTTOM'] && !$linkedArticlesPos) {
						$linkedArticlesPos = 'bottom';
					}
					if ($sectionRoot['UF_BLOG_WIDE'] && !$linkedArticlesRows) {
						$linkedArticlesRows = $sectionRoot['UF_BLOG_WIDE'];
					}
					if ($sectionRoot['UF_BLOG_MOBILE'] && !$linkedArticlesRowsMobile) {
						$linkedArticlesRowsMobile = $sectionRoot['UF_BLOG_MOBILE'];
					}
					if ($sectionRoot['UF_LINKED_BANNERS'] && !$linkedBanners) {
						$linkedBanners = $sectionRoot['UF_LINKED_BANNERS'];
					}
					if ($sectionRoot['UF_BANNERS_BOTTOM'] && !$linkedBannersPos) {
						$linkedBannersPos = 'bottom';
					}
					if ($sectionRoot['UF_BANNERS_WIDE'] && !$linkedBannersRows) {
						$linkedBannersRows = $sectionRoot['UF_BANNERS_WIDE'];
					}
					if ($sectionRoot['UF_BANNERS_MOBILE'] && !$linkedBannersRowsMobile) {
						$linkedBannersRowsMobile = $sectionRoot['UF_BANNERS_MOBILE'];
					}
					if ($sectionRoot[$arParams["SECTION_DISPLAY_PROPERTY"]] && !$arSection["DISPLAY"]) {
						$arDisplayRes = CUserFieldEnum::GetList(array(), array("ID" => $sectionRoot[$arParams["SECTION_DISPLAY_PROPERTY"]]));
						if ($arDisplay = $arDisplayRes->GetNext()) {
							$arSection["DISPLAY"] = $arDisplay["XML_ID"];
						}
					}
					if ($sectionRoot["UF_LINE_ELEMENT_CNT"] && !$bSetElementsLineRow) {
						$arCntRes = CUserFieldEnum::GetList(array(), array("ID" => $sectionRoot["UF_LINE_ELEMENT_CNT"]));
						if ($arLineCnt = $arCntRes->GetNext()) {
							$arParams["LINE_ELEMENT_COUNT"] = $arLineCnt["XML_ID"];
							$bSetElementsLineRow = true;
						}
					}
					if ($sectionRoot['UF_TABLE_PROPS'] && !$viewTableProps) {
                        $viewTableProps = $sectionRoot['UF_TABLE_PROPS'];
                    }
				}
			}
		}
	}
	if ($typeTmpSKU) {
		$rsTypes = CUserFieldEnum::GetList(array(), array("ID" => $typeTmpSKU));
		if($arType = $rsTypes->Fetch()){
			$typeSKU = $arType['XML_ID'];
		}
	}
	$typeSKU = \Aspro\Functions\CAsproMax::processRetriveOptionValue('TYPE_SKU', $typeSKU);
	

	if($viewTmpFilter){
		$rsViews = CUserFieldEnum::GetList(array(), array('ID' => $viewTmpFilter));
		if($arView = $rsViews->Fetch()){
			$viewFilter = $arView['XML_ID'];
		}
	}
	$viewFilter = \Aspro\Functions\CAsproMax::processRetriveOptionValue('FILTER_VIEW', strtoupper($viewFilter));

	if ($viewTableProps) {
        $rsViews = CUserFieldEnum::GetList(array(), array('ID' => $viewTableProps));
        if ($arView = $rsViews->Fetch()) {
            $typeTableProps = strtolower($arView['XML_ID']);
        }
    }
}



$linerow = $arParams["LINE_ELEMENT_COUNT"];

if (!isset($linkedArticlesPos) || !$linkedArticlesPos) {
	$linkedArticlesPos = 'content';
}
if (!isset($linkedArticlesRows) || !$linkedArticlesRows) {
	$linkedArticlesRows = 1;
}
if (!isset($linkedArticlesRowsMobile) || !$linkedArticlesRowsMobile) {
	$linkedArticlesRowsMobile = 1;
}

if (!isset($linkedBannersPos) || !$linkedBannersPos) {
	$linkedBannersPos = 'content';
}
if (!isset($linkedBannersRows) || !$linkedBannersRows) {
	$linkedBannersRows = 1;
}
if (!isset($linkedBannersRowsMobile) || !$linkedBannersRowsMobile) {
	$linkedBannersRowsMobile = 1;
}

$bSimpleSectionTemplate = (isset($arSection["DISPLAY"]) && $arSection["DISPLAY"] == "simple");

if ($bSimpleSectionTemplate) {
	$APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", "Y");
	$APPLICATION->AddViewContent('right_block_class', 'simple_page ');
	unset($arParams['LANDING_POSITION']);

	$template = 'catalog_'.$arSection["DISPLAY"];

	$arParams["USE_PRICE_COUNT"] = "N";
	$bSetElementsLineRow = true;

	$arTheme['MOBILE_CATALOG_LIST_ELEMENTS_COMPACT']['VALUE'] = 'Y';
	$arTheme['TYPE_SKU']['VALUE'] = 'TYPE_2';
}?>

<?$bHideSideSectionBlock = ($arParams["SHOW_SIDE_BLOCK_LAST_LEVEL"] == "Y" && $iSectionsCount && $arParams["INCLUDE_SUBSECTIONS"] == "N");
if ($bHideSideSectionBlock) {
	$APPLICATION->SetPageProperty("HIDE_LEFT_BLOCK", "Y");
}?>

<?$bShowLeftBlock = (!$bSimpleSectionTemplate && ($APPLICATION->GetProperty("HIDE_LEFT_BLOCK") != "Y" && !($arTheme['HEADER_TYPE']['VALUE'] == 28 || $arTheme['HEADER_TYPE']['VALUE'] == 29)));?>
<div class="main-catalog-wrapper flexbox<?= $arTheme["SIDE_MENU"]["VALUE"] === 'LEFT' ? ' flexbox--row-reverse' : ' flexbox--row' ; ?> flexbox--justify-space-between flexbox--align-start<?= CMax::GetFrontParametrValue("LEFT_BLOCK_CS_TYPE") === 'NORMAL' ? ' flexbox--gap flexbox--gap-32' : '' ; ?>">
	<div class="section-content-wrapper <?=($bShowLeftBlock ? 'with-leftblock' : '');?>">
		<?
		if($section)
		{
			?>

			<?$this->SetViewTarget("section_bnr_h1_content");?>
				<?if($section[$arParams['SECTION_BG']]):?>
					<div class="section-banner-top">
						<div class="section-banner-top__picture" style="background: url(<?=CFile::GetPath($section[$arParams['SECTION_BG']])?>) center/cover no-repeat;"></div>
					</div>
				<?endif;?>
			<?$this->EndViewTarget();?>

			<?if($section[$arParams['SECTION_BG']]):?>
				<?global $dopClass;
					$dopClass .= ' has-secion-banner';
					if(!$section['UF_SECTION_BG_DARK'])
						$dopClass .= ' light-menu-color';?>
				<div class="js-banner" data-class="<?=$dopClass?>"></div>
				<?\Aspro\Max\Functions\Extensions::init('banners');?>
			<?endif;?>
		<?}
		else{
			\Bitrix\Iblock\Component\Tools::process404(
				""
				,($arParams["SET_STATUS_404"] === "Y")
				,($arParams["SET_STATUS_404"] === "Y")
				,($arParams["SHOW_404"] === "Y")
				,$arParams["FILE_404"]
			);
		}

		if($arRegion)
		{
			if($arRegion['LIST_PRICES'])
			{
				if(reset($arRegion['LIST_PRICES']) != 'component')
					$arParams['PRICE_CODE'] = array_keys($arRegion['LIST_PRICES']);
			}
			if($arRegion['LIST_STORES'])
			{
				if(reset($arRegion['LIST_STORES']) != 'component')
					$arParams['STORES'] = $arRegion['LIST_STORES'];
			}
		}

		if($arParams['LIST_PRICES'])
		{
			foreach($arParams['LIST_PRICES'] as $key => $price)
			{
				if(!$price)
					unset($arParams['LIST_PRICES'][$key]);
			}
		}

		if($arParams['STORES'])
		{
			foreach($arParams['STORES'] as $key => $store)
			{
				if(!$store)
					unset($arParams['STORES'][$key]);
			}
		}
		
		$NextSectionID = $arSection["ID"];?>
		<?if($arParams["USE_SHARE"] == "Y" && $arSection):?>
			<?$this->SetViewTarget('product_share');?>
				<?\Aspro\Functions\CAsproMax::showShareBlock('top')?>
			<?$this->EndViewTarget();?>
		<?endif;?>
		<?
		//seo
		$catalogInfoIblockId = CMaxCache::$arIBlocks[SITE_ID]["aspro_max_catalog"]["aspro_max_catalog_info"][0];
		if($catalogInfoIblockId && !$bSimpleSectionTemplate){
			/*fix*/
			$current_url =  $APPLICATION->GetCurDir();
			$real_url = $current_url;
			$current_url =  str_replace(array('%25', '&quot;', '&#039;'), array('%', '"', "'"), $current_url); // for utf-8 fix some problem
			$encode_current_url = urlencode($current_url);
			$gaps_encode_current_url = str_replace(' ', '%20', $current_url);
			$encode_current_url_slash = str_replace(array('%2F', '+'), array('/', '%20'), $encode_current_url);
			$urldecodedCP = iconv("windows-1251", "utf-8//IGNORE", $current_url);
			$urldecodedCP_slash = str_replace(array('%2F'), array('/'), rawurlencode($urldecodedCP));
			$replacements = array('"' ,'%27', '%20', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%3F', '%23', '%5B', '%5D');// for fix some problem  with spec chars in prop
			$entities = array("&quot;", '&#039;', ' ', '!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "?", "#", "[", "]");
			$replacedSpecChar = str_replace($entities, $replacements, $current_url);
			/**/

			$arSeoItems = CMaxCache::CIBLockElement_GetList(array('SORT' => 'ASC', 'CACHE' => array("MULTI" => "Y", "TAG" => CMaxCache::GetIBlockCacheTag($catalogInfoIblockId))), array("IBLOCK_ID" => $catalogInfoIblockId, "ACTIVE" => "Y", "PROPERTY_FILTER_URL" => array($real_url, $current_url, $gaps_encode_current_url, $urldecodedCP_slash, $encode_current_url_slash, $replacedSpecChar)), false, false, array("ID", "IBLOCK_ID", "PROPERTY_FILTER_URL", "PROPERTY_LINK_REGION"));
			$arSeoItem = $arTmpRegionsLanding = array();
			if($arSeoItems)
			{
				$iLandingItemID = 0;
				//$current_url =  $APPLICATION->GetCurDir();
				//$url = urldecode(str_replace(' ', '+', $current_url));
				foreach($arSeoItems as $arItem)
				{
					if(!is_array($arItem['PROPERTY_LINK_REGION_VALUE']))
						$arItem['PROPERTY_LINK_REGION_VALUE'] = (array)$arItem['PROPERTY_LINK_REGION_VALUE'];

					if(!$arSeoItem)
					{
						//$urldecoded = urldecode($arItem["PROPERTY_FILTER_URL_VALUE"]);
						//$urldecodedCP = iconv("utf-8", "windows-1251//IGNORE", $urldecoded);
						//if($urldecoded == $url || $urldecoded == $current_url || $urldecodedCP == $current_url)
						//{
							if($arItem['PROPERTY_LINK_REGION_VALUE'])
							{
								if($arRegion && in_array($arRegion['ID'], $arItem['PROPERTY_LINK_REGION_VALUE']))
									$arSeoItem = $arItem;
							}
							else
							{
								$arSeoItem = $arItem;
							}

							if($arSeoItem)
							{
								$iLandingItemID = $arSeoItem['ID'];
								$arSeoItem = CMaxCache::CIBLockElement_GetList(array('SORT' => 'ASC', 'CACHE' => array("MULTI" => "N", "TAG" => CMaxCache::GetIBlockCacheTag($catalogInfoIblockId))), array("IBLOCK_ID" => $catalogInfoIblockId, "ID" => $iLandingItemID), false, false, array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "DETAIL_PICTURE", "PROPERTY_FILTER_URL", "PROPERTY_LINK_REGION", "PROPERTY_FORM_QUESTION", "PROPERTY_SECTION_SERVICES", "PROPERTY_TIZERS", "PROPERTY_SECTION", "DETAIL_TEXT", "PROPERTY_I_ELEMENT_PAGE_TITLE", "PROPERTY_I_ELEMENT_PREVIEW_PICTURE_FILE_ALT", "PROPERTY_I_ELEMENT_PREVIEW_PICTURE_FILE_TITLE", "PROPERTY_I_SKU_PAGE_TITLE", "PROPERTY_I_SKU_PREVIEW_PICTURE_FILE_ALT", "PROPERTY_I_SKU_PREVIEW_PICTURE_FILE_TITLE", "ElementValues"));

								$arIBInheritTemplates = array(
									"ELEMENT_PAGE_TITLE" => $arSeoItem["PROPERTY_I_ELEMENT_PAGE_TITLE_VALUE"],
									"ELEMENT_PREVIEW_PICTURE_FILE_ALT" => $arSeoItem["PROPERTY_I_ELEMENT_PREVIEW_PICTURE_FILE_ALT_VALUE"],
									"ELEMENT_PREVIEW_PICTURE_FILE_TITLE" => $arSeoItem["PROPERTY_I_ELEMENT_PREVIEW_PICTURE_FILE_TITLE_VALUE"],
									"SKU_PAGE_TITLE" => $arSeoItem["PROPERTY_I_SKU_PAGE_TITLE_VALUE"],
									"SKU_PREVIEW_PICTURE_FILE_ALT" => $arSeoItem["PROPERTY_I_SKU_PREVIEW_PICTURE_FILE_ALT_VALUE"],
									"SKU_PREVIEW_PICTURE_FILE_TITLE" => $arSeoItem["PROPERTY_I_SKU_PREVIEW_PICTURE_FILE_TITLE_VALUE"],
								);
								if(CMax::isSmartSeoInstalled())
									\Aspro\Smartseo\General\Smartseo::disallowNoindexRule(true);
							}
						//}
					}

					if($arItem['PROPERTY_LINK_REGION_VALUE'])
					{
						if(!$arRegion || !in_array($arRegion['ID'], $arItem['PROPERTY_LINK_REGION_VALUE']))
							$arTmpRegionsLanding[] = $arItem['ID'];
					}
				}
			}

			if ($arSeoItems && $bHideSideSectionBlock) {
				$arSeoItems = [];
			}
		}

		if($arRegion)
		{
			if($arRegion["LIST_STORES"] && $arParams["HIDE_NOT_AVAILABLE"] == "Y")
			{
				$arStoresFilter = TSolution\Filter::getAvailableByStores($arParams['STORES']);
				if($arStoresFilter){
					$GLOBALS[$arParams["FILTER_NAME"]][] = $arStoresFilter;
				}
			}
			$arParams["USE_REGION"] = "Y";

			$GLOBALS[$arParams['FILTER_NAME']]['IBLOCK_ID'] = $arParams['IBLOCK_ID'];
			if(CMax::GetFrontParametrValue('REGIONALITY_FILTER_ITEM') == 'Y' && CMax::GetFrontParametrValue('REGIONALITY_FILTER_CATALOG') == 'Y'){
				$GLOBALS[$arParams['FILTER_NAME']]['PROPERTY_LINK_REGION'] = $arRegion['ID'];
			}
			CMax::makeElementFilterInRegion($GLOBALS[$arParams['FILTER_NAME']]);
		}

		/* hide compare link from module options */
		if(CMax::GetFrontParametrValue('CATALOG_COMPARE') == 'N')
			$arParams["USE_COMPARE"] = 'N';
		/**/

		$arParams['DISPLAY_WISH_BUTTONS'] = CMax::GetFrontParametrValue('CATALOG_DELAY');
	
		if(!in_array("DETAIL_PAGE_URL", (array)$arParams["LIST_OFFERS_FIELD_CODE"]))
			$arParams["LIST_OFFERS_FIELD_CODE"][] = "DETAIL_PAGE_URL";

		if ($bUseModuleProps){
			$arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
			$arParams['OFFERS_CART_PROPERTIES'] = (array)\Bitrix\Catalog\Product\PropertyCatalogFeature::getBasketPropertyCodes($arSKU['IBLOCK_ID'], ['CODE' => 'Y']);
		}

		$arConfigTransfer = array(
			"LIST_OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
			"LIST_OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
			"SHOW_GALLERY" => $arParams["SHOW_GALLERY"],
			"MAX_GALLERY_ITEMS" => $arParams["MAX_GALLERY_ITEMS"],
			"SHOW_POPUP_PRICE" => CMax::GetFrontParametrValue('SHOW_POPUP_PRICE'),
			"ADD_DETAIL_TO_SLIDER" => $arParams["DETAIL_ADD_DETAIL_TO_SLIDER"],
			"IBINHERIT_TEMPLATES" => $arSeoItem ? $arIBInheritTemplates : array(),
			"DISPLAY_COMPARE" => CMax::GetFrontParametrValue('CATALOG_COMPARE'),
			"DISPLAY_WISH_BUTTONS" => $arParams["DISPLAY_WISH_BUTTONS"],
			"COMPATIBLE_MODE" => "Y",
		);

		$arTransferParams = \Aspro\Functions\CAsproMax::getTransferParams($arParams, $arConfigTransfer);?>

		<?$bContolAjax = (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest" && isset($_GET["control_ajax"]) && $_GET["control_ajax"] == "Y" );?>
		<?// section elements?>
		<div class="js_wrapper_items<?=($arTheme["LAZYLOAD_BLOCK_CATALOG"]["VALUE"] == "Y" ? ' with-load-block' : '')?>" data-params='<?//=str_replace('\'', '"', CUtil::PhpToJSObject($arTransferParams, false))?>'>
			<div class="js-load-wrapper">
				<?if($bContolAjax):?>
					<?$APPLICATION->RestartBuffer();?>
				<?endif;?>

				<?@include_once('page_blocks/'.$arParams["SECTION_ELEMENTS_TYPE_VIEW"].'.php');?>

				<?if($bContolAjax):?>
					<?die();?>
				<?endif;?>
			</div>
		</div>

        <?$bgFilled = ($arParams["LANDING_TYPE_VIEW"] == "FROM_MODULE" ? $arTheme["CATALOG_PAGE_LANDINGS"]["VALUE"] : $arParams["LANDING_TYPE_VIEW"]);?>
        <?$GLOBALS["arTagsSections"] = array(
            "IBLOCK_ID" => 42,
            "IBLOCK_SECTION_ID" => $section["ID"],
            "ACTIVE" => "Y",
            "UF_TAG" => 1
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:catalog.section.list",
            "tags_list",
            array(
                "USE_REGION" => ($arRegion ? "Y" : "N"),
                "VIEW_MODE" => "TEXT",
                "SHOW_PARENT_NAME" => "N",
                "IBLOCK_TYPE" => "aspro_max_catalog",
                "IBLOCK_ID" => 42,
                "SECTION_ID" => $section["ID"],
                "SECTION_CODE" => "",
                "SECTION_URL" => "",
                "COUNT_ELEMENTS" => "N",
                "TOP_DEPTH" => "1",
                "SECTION_FIELDS" => array("NAME", "SECTION_PAGE_URL"),
                "SECTION_USER_FIELDS" => "",
                "VIEW_TYPE" => $arTheme["CATALOG_PAGE_LANDINGS_VIEW"]["VALUE"],
                "NEWS_COUNT" => "999",
                "SHOW_COUNT" => $arParams["LANDING_SECTION_COUNT"],
                "SHOW_COUNT_MOBILE" => ($arParams["LANDING_SECTION_COUNT_MOBILE"] ? $arParams["LANDING_SECTION_COUNT_MOBILE"] : 3),
                "COMPARE_FIELD" => "FILTER_URL",
                "CUR_PAGE" => $APPLICATION->GetCurPage(),
                "COMPARE_PROP" => "Y",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "BG_FILLED" => $bgFilled == "landing_2" ? "Y" : "N",
                "SORT_BY2" => "ID",
                "SORT_ORDER2" => "DESC",
                "FILTER_NAME" => "arTagsSections",
                "FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "PROPERTY_CODE" => array(
                    0 => "LINK",
                    1 => "",
                ),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "CACHE_TYPE" =>$arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "SEF_CATALOG_URL" => $arResult["URL_TEMPLATES"]["smart_filter"],
                "CACHE_FILTER" => "Y",
                "CACHE_GROUPS" => "N",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "j F Y",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "N",
                "PAGER_TEMPLATE" => "",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "COMPONENT_TEMPLATE" => "next",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "TITLE_BLOCK" => "Тегированные страницы",
                "SHOW_404" => "N",
                "MESSAGE_404" => ""
            ),
            false, array("HIDE_ICONS" => "Y")
        );?>


		<?CMax::get_banners_position('CONTENT_BOTTOM');
		global $bannerContentBottom;
		$bannerContentBottom = true;
		?>
		<?CMax::checkBreadcrumbsChain($arParams, $arSection);?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.history.js');?>
	</div>
	<?if($bShowLeftBlock):?>
		<?CMax::ShowPageType('left_block');?>
	<?endif;?>
</div>
<?$tablePropsView = $typeTableProps ?? strtolower(CMax::GetFrontParametrValue('SHOW_TABLE_PROPS'));?>
<?if ( $tablePropsView === "cols" ):?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/tableScroller.js');?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/blocks/scroller.css');?>
<?endif;?>
<?
$bTopHeaderOpacity = false;

if( isset($arTheme['HEADER_TYPE']['LIST'][ $arTheme['HEADER_TYPE']['VALUE'] ]['ADDITIONAL_OPTIONS'])  && isset($arTheme['HEADER_TYPE']['LIST'][ $arTheme['HEADER_TYPE']['VALUE'] ]['ADDITIONAL_OPTIONS']['TOP_HEADER_OPACITY']) ) {
	$bTopHeaderOpacity = $arTheme['HEADER_TYPE']['LIST'][ $arTheme['HEADER_TYPE']['VALUE'] ]['ADDITIONAL_OPTIONS']['TOP_HEADER_OPACITY']['VALUE'] == 'Y';
}

if ($bTopHeaderOpacity && $section[$arParams['SECTION_BG']]) {
	global $dopBodyClass;
	$dopBodyClass .= ' top_header_opacity';
}

CMax::setCatalogSectionDescription(
	array(
		'FILTER_NAME' => $arParams['FILTER_NAME'],
		'CACHE_TYPE' => $arParams['CACHE_TYPE'],
		'CACHE_TIME' => $arParams['CACHE_TIME'],
		'SECTION_ID' => $arSection['ID'],
		'SHOW_SECTION_DESC' => $arParams['SHOW_SECTION_DESC'],
		'SEO_ITEM' => $arSeoItem,
	)
);

