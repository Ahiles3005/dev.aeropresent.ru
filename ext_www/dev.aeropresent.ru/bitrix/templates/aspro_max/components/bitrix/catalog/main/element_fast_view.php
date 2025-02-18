<?//$APPLICATION->ShowHeadScripts();?>
<?$APPLICATION->ShowAjaxHead();?>
<?
$arParams['OID'] = 0;
if ($arElement['TYPE'] == \Bitrix\Catalog\ProductTable::TYPE_SKU && $typeSKU == 'TYPE_1') {
	$context=\Bitrix\Main\Context::getCurrent();
	$request=$context->getRequest();
	if ($oid = $request->getQuery($arParams["SKU_DETAIL_ID"])) {
		if(array_key_exists($oid, current(CCatalogSku::getOffersList($arElement['ID'], $arElement['IBLOCK_ID'], null, ['ID', 'NAME'])))) {
			$arParams['OID'] = $oid;
		}
	}
}
?>
<a href="#" class="close jqmClose"><?=CMax::showIconSvg('', SITE_TEMPLATE_PATH.'/images/svg/Close.svg')?></a>
<div class="catalog_detail js-notice-block" itemscope itemtype="http://schema.org/Product">
	<?@include_once('page_blocks/'.$arTheme["USE_FAST_VIEW_PAGE_DETAIL"]["VALUE"].'.php');?>
</div>
<?if($arRegion)
{
	$arTagSeoMarks = array();
	foreach($arRegion as $key => $value)
	{
		if(strpos($key, 'PROPERTY_REGION_TAG') !== false && strpos($key, '_VALUE_ID') === false)
		{
			$tag_name = str_replace(array('PROPERTY_', '_VALUE'), '', $key);
			$arTagSeoMarks['#'.$tag_name.'#'] = $key;
		}
	}
	if($arTagSeoMarks)
		CMaxRegionality::addSeoMarks($arTagSeoMarks);
}?>