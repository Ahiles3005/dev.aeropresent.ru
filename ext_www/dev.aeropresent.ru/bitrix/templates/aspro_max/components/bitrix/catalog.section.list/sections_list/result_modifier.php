<?	
global $arRegion;

if ($arParams["SHOW_MORE_SUBSECTIONS"] && $arParams["DEPTH_LEVEL"]) {

	$rootLevel = $arParams["DEPTH_LEVEL"] + 1;
	$childLevel = $rootLevel + 1;
	$arSections = array();

	foreach( $arResult["SECTIONS"] as $arItem ) {
		if( $arItem["DEPTH_LEVEL"] == $rootLevel ) { $arSections[$arItem["ID"]] = $arItem;}
		elseif( $arItem["DEPTH_LEVEL"] == $childLevel ) {$arSections[$arItem["IBLOCK_SECTION_ID"]]["SECTIONS"][$arItem["ID"]] = $arItem;}
	}
	$arResult["SECTIONS"] = $arSections;

} elseif ($arParams["TOP_DEPTH"]>1) {

	$arSections = array();
	$arSectionsDepth3 = array();
	foreach( $arResult["SECTIONS"] as $arItem ) {
		if( $arItem["DEPTH_LEVEL"] == 1 ) { $arSections[$arItem["ID"]] = $arItem;}
		elseif( $arItem["DEPTH_LEVEL"] == 2 ) {$arSections[$arItem["IBLOCK_SECTION_ID"]]["SECTIONS"][$arItem["ID"]] = $arItem;}
		elseif( $arItem["DEPTH_LEVEL"] == 3 ) {$arSectionsDepth3[] = $arItem;}
	}
	if($arSectionsDepth3){
		foreach( $arSectionsDepth3 as $arItem) {
			foreach( $arSections as $key => $arSection) {
				if (is_array($arSection["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]]) && !empty($arSection["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]])) {
					$arSections[$key]["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]]["SECTIONS"][$arItem["ID"]] = $arItem;
				}
			}
		}
	}
	$arResult["SECTIONS"] = $arSections;

}

if( isset($arParams["ASPRO_COUNT_ELEMENTS"]) && $arParams["ASPRO_COUNT_ELEMENTS"] === "Y" ){
	foreach($arResult["SECTIONS"] as &$arSection){
		$arOrder = [
			'CACHE' => [
				'MULTI' => 'N', 
				'TAG' => CMaxCache::GetIBlockCacheTag($arParams["IBLOCK_ID"])
			]
		];

		$elementCountFilter = [
			'IBLOCK_ID' => $arSection['IBLOCK_ID'],
			'SECTION_ID' => $arSection['ID'],
			'CHECK_PERMISSIONS' => 'Y',
			'MIN_PERMISSION' => 'R',
			'INCLUDE_SUBSECTIONS' => 'Y',
			'ACTIVE' => 'Y',
		];

		if( $arParams['HIDE_NOT_AVAILABLE'] === 'Y' )
			$elementCountFilter['AVAILABLE'] = 'Y';

		$arFilter = $elementCountFilter;

		CMax::makeElementFilterInRegion($arFilter);

		if( is_array($GLOBALS['arRegionLink']) && CMax::GetFrontParametrValue('REGIONALITY_FILTER_ITEM') == 'Y' && CMax::GetFrontParametrValue('REGIONALITY_FILTER_CATALOG') == 'Y' ){
			$arFilter = array_merge($GLOBALS['arRegionLink'], $arFilter);
		}

		if( $arRegion ){			
			if( $arRegion['LIST_STORES'] && $arParams['HIDE_NOT_AVAILABLE'] === 'Y' ){
				if( $arRegion ){			
					if( $arRegion['LIST_STORES'] && $arParams['HIDE_NOT_AVAILABLE'] === 'Y' ){
						$arStoresFilter = TSolution\Filter::getAvailableByStores($arParams['STORES']);
						if($arStoresFilter){
							$arFilter[] = $arStoresFilter;
						}
					}
				}
			}
		}

		$countElements = CMaxCache::CIBlockElement_GetList($arOrder, $arFilter, []);

		$arSection['ELEMENT_CNT'] = $countElements;
	}
}

?>