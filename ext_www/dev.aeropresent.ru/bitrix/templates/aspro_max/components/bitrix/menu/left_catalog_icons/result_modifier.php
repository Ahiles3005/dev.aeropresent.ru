<?php

global $arTheme, $arRegion;
$catalog_id = Bitrix\Main\Config\Option::get('aspro.max', 'CATALOG_IBLOCK_ID', CMaxCache::$arIBlocks[SITE_ID]['aspro_max_catalog']['aspro_max_catalog'][0]);
$arSectionsFilter = ['IBLOCK_ID' => $catalog_id, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y', 'ACTIVE_DATE' => 'Y', '<DEPTH_LEVEL' => $arParams['MAX_LEVEL']];
$arSections = CMaxCache::CIBlockSection_GetList(['SORT' => 'ASC', 'ID' => 'ASC', 'CACHE' => ['TAG' => CMaxCache::GetIBlockCacheTag($catalog_id), 'GROUP' => ['ID']]], CMax::makeSectionFilterInRegion($arSectionsFilter), false, ['ID', 'IBLOCK_ID', 'NAME', 'PICTURE', 'LEFT_MARGIN', 'RIGHT_MARGIN', 'DEPTH_LEVEL', 'SECTION_PAGE_URL', 'IBLOCK_SECTION_ID', 'UF_CATALOG_ICON', 'UF_MENU_BANNER', 'UF_MENU_BRANDS']);
if ($arSections) {
    global $arTheme;
    $MENU_TYPE = $arTheme['MEGA_MENU_TYPE']['VALUE'];
    $bMenuIblock = '2' == $arTheme['MEGA_MENU_STRUCTURE']['VALUE'];
    $bRightSide = 'Y' == $arTheme['SHOW_RIGHT_SIDE']['VALUE'];
    $bRightBrand = $bRightSide && 'BRANDS' == $arTheme['SHOW_RIGHT_SIDE']['DEPENDENT_PARAMS']['RIGHT_CONTENT']['VALUE'];
    $arBrandsID = [];

    $arResult = [];
    $cur_page = $GLOBALS['APPLICATION']->GetCurPage(true);
    $cur_page_no_index = $GLOBALS['APPLICATION']->GetCurPage(false);

    foreach ($arSections as $ID => $arSection) {
        $arSections[$ID]['SELECTED'] = CMenu::IsItemSelected($arSection['SECTION_PAGE_URL'], $cur_page, $cur_page_no_index);
        if ($arSection['UF_CATALOG_ICON']) {
            $img = CFile::ResizeImageGet($arSection['UF_CATALOG_ICON'], ['width' => 36, 'height' => 36], BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $arSections[$ID]['IMAGES'] = $img;
        } elseif ($arSection['PICTURE']) {
            $img = CFile::ResizeImageGet($arSection['PICTURE'], ['width' => 50, 'height' => 50], BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $arSections[$ID]['IMAGES'] = $img;
        }
        if ($arSection['IBLOCK_SECTION_ID']) {
            if (!isset($arSections[$arSection['IBLOCK_SECTION_ID']]['CHILD'])) {
                $arSections[$arSection['IBLOCK_SECTION_ID']]['CHILD'] = [];
            }
            $arSections[$arSection['IBLOCK_SECTION_ID']]['CHILD'][] = &$arSections[$arSection['ID']];
        }

        if (1 == $arSection['DEPTH_LEVEL']) {
            $arResult[] = &$arSections[$arSection['ID']];
        }

        if ($bRightBrand) {
            if (isset($arSection['UF_MENU_BRANDS']) && $arSection['UF_MENU_BRANDS']) {
                foreach ($arSection['UF_MENU_BRANDS'] as $brandID) {
                    $arBrandsID[$brandID] = $brandID;
                }
            }
        }
    }

    if ($bMenuIblock) {
        if ($catalog_id) {
            if ($arCatalogIblock = CMaxCache::$arIBlocksInfo[$catalog_id]) {
                if ($catalogPageUrl = str_replace('#SITE_DIR#', SITE_DIR, $arCatalogIblock['LIST_PAGE_URL'])) {
                    $menuIblockId = CMaxCache::$arIBlocks[SITE_ID]['aspro_max_catalog']['aspro_max_megamenu'][0];
                    if ($menuIblockId) {
                        $menuRootCatalogSectionId = CMaxCache::CIblockSection_GetList(['SORT' => 'ASC', 'CACHE' => ['TAG' => CMaxCache::GetIBlockCacheTag($menuIblockId), 'RESULT' => ['ID'], 'MULTI' => 'N']], ['ACTIVE' => 'Y', 'IBLOCK_ID' => $menuIblockId, 'DEPTH_LEVEL' => 1, 'UF_MENU_LINK' => $catalogPageUrl], false, ['ID'], ['nTopCount' => 1]);
                        if ($menuRootCatalogSectionId) {
                            $arResult = [
                                [
                                    'LINK' => $catalogPageUrl,
                                    'PARAMS' => [
                                        'FROM_IBLOCK' => 1,
                                        'DEPTH_LEVEL' => 1,
                                        'MEGA_MENU_CHILDS' => 1,
                                    ],
                                ],
                            ];
                        }
                    }
                }
            }
        }
        CMax::replaceMenuChilds($arResult, $arParams);
    }

    if ($bRightBrand) {
        if ($arBrandsID) {
            $brandIblockId = CMaxCache::$arIBlocks[SITE_ID]['aspro_max_content']['aspro_max_brands'][0];
            $arBrandFilter = ['ACTIVE' => 'Y', 'IBLOCK_ID' => $brandIblockId, 'ID' => $arBrandsID];
            $arBrandSelect = ['ID', 'PREVIEW_PICTURE', 'NAME', 'DETAIL_PAGE_URL', 'IBLOCK_ID'];
            $arBrands = CMaxCache::CIblockElement_GetList(['SORT' => 'ASC', 'CACHE' => ['GROUP' => 'ID', 'TAG' => CMaxCache::GetIBlockCacheTag($brandIblockId)]], $arBrandFilter, false, false, $arBrandSelect);

            if ($arBrands) {
                foreach ($arResult as $key => $arItem) {
                    if (isset($arItem['UF_MENU_BRANDS']) && $arItem['UF_MENU_BRANDS']) {
                        foreach ($arItem['UF_MENU_BRANDS'] as $brandKey => $brandID) {
                            if ($arBrands[$brandID]) {
                                $arResult[$key]['UF_MENU_BRANDS'][$brandKey] = $arBrands[$brandID];
                            } else {
                                unset($arResult[$key]['UF_MENU_BRANDS'][$brandKey]);
                            }
                        }
                    }
                }
            }
        }
    }
}
