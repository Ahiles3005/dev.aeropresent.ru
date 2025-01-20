<?
if($arResult['ITEMS'])
{
	foreach($arResult['ITEMS'] as &$arItem)
	{
		$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']["ID"], array('width'=>300, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
		$arItem['PREVIEW_PICTURE']["SRC_SMALL"] = $file["src"];
	}
	unset($arItem);
}
?>