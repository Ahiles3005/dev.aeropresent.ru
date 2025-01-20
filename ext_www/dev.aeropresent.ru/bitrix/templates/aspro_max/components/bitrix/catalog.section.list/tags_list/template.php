<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>
<?use \Bitrix\Main\Localization\Loc;?>
<?if($arResult['SECTIONS']):?>
    <div clas="bottom-tags-list">
        <div class="landings-list landings_list with-normal">
			<div class="landings-list__title darken font_mlg"><?=$arParams["TITLE_BLOCK"];?></div>
            <!-- noindex -->
            <div class="landings-list__info landings-list__info--mobiled visible-xs ">
                <div class="d-inline landings-list__info-wrapper  flexbox flexbox--row flexbox--wrap">
                    <?foreach($arResult['SECTIONS'] as $arSect):?>
                        <div class="landings-list__item font_xs  " id="">
                            <div>
                                <a class="landings-list__name<?=($arParams["BG_FILLED"] ? ' landings-list__item--filled-bg box-shadow-sm' : ' landings-list__item--hover-bg');?> rounded3" href="<?=$arSect["SECTION_PAGE_URL"];?>">
                                    <span><?=$arSect['NAME']?></span>
                                </a>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
            <!-- /noindex -->
            <div class="landings-list__info hidden-xs ">
                <div class="d-inline landings-list__info-wrapper  flexbox flexbox--row flexbox--wrap">
                    <?foreach($arResult['SECTIONS'] as $arSect):?>
                        <div class="landings-list__item font_xs  " id="">
                            <div>
                                <a class="landings-list__name<?=($arParams["BG_FILLED"] ? ' landings-list__item--filled-bg box-shadow-sm' : ' landings-list__item--hover-bg');?> rounded3" href="<?=$arSect["SECTION_PAGE_URL"];?>">
                                    <span><?=$arSect['NAME']?></span>
                                </a>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
<?endif?>