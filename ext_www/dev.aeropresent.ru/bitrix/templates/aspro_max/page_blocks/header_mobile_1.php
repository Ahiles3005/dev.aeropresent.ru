<?
global $arTheme, $arRegion;
$logoClass = ($arTheme['COLORED_LOGO']['VALUE'] !== 'Y' ? '' : ' colored');
?>
<div class="mobileheader-v1">
    <div class="logo-block pull-left">
        <div class="logo<?=$logoClass?> mobileheader-v1-logo ">
            <?=CMax::ShowBufferedLogo();?>
        </div>
    </div>
    <div class="burger pull-left">
        <?=CMax::showIconSvg("burger dark", SITE_TEMPLATE_PATH."/images/svg/burger.svg");?>
        <?=CMax::showIconSvg("close dark", SITE_TEMPLATE_PATH."/images/svg/Close.svg");?>
    </div>
    <div class="right-icons pull-right">
        <div class="pull-right">
            <div class="wrap_icon wrap_basket">
                <?=CMax::ShowBasketWithCompareLink('', 'big', false, false, true);?>
            </div>
        </div>
        <div class="pull-right">
            <div class="wrap_icon wrap_cabinet">
                <?=CMax::showCabinetLink(true, false, 'big');?>
            </div>
        </div>
        <div class="pull-right">
            <div class="wrap_icon">
                <button class="top-btn inline-search-show twosmallfont">
                    <?=CMax::showIconSvg("search", SITE_TEMPLATE_PATH."/images/svg/Search.svg");?>
                </button>
            </div>
        </div>
        <div class="pull-right">
            <div class="wrap_icon wrap_phones">
                <?CMax::ShowHeaderMobilePhones("big");?>
            </div>
        </div>
    </div>
    <?=\Aspro\Functions\CAsproMax::showProgressBarBlock();?>
</div>