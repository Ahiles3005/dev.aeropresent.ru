<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if($_GET["debug"] == "y")
	error_reporting(E_ERROR | E_PARSE);
IncludeTemplateLangFile(__FILE__);
global $APPLICATION, $arRegion, $arSite, $arTheme, $bIndexBot, $bIframeMode;
$arSite = CSite::GetByID(SITE_ID)->Fetch();
$htmlClass = ($_REQUEST && isset($_REQUEST['print']) ? 'print' : false);
$bIncludedModule = (\Bitrix\Main\Loader::includeModule("aspro.max"));?>
<?php
// Получаем текущий URI
$requestUri = $_SERVER['REQUEST_URI'];

// Массив страниц, для которых нужно добавить meta robots
$noIndexPages = [
    '/blog/100cashback',
    '/blog/100cashback/',
    '/blog/100-keshbek-za-zakaz/',
];

// Проверяем, нужно ли добавить meta robots
$addNoIndexMeta = in_array($requestUri, $noIndexPages);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" <?=($htmlClass ? 'class="'.$htmlClass.'"' : '')?> <?=($bIncludedModule ? CMax::getCurrentHtmlClass() : '')?>>
<head>
<?php if ($addNoIndexMeta): ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<?$APPLICATION->ShowMeta("viewport");?>
	<?$APPLICATION->ShowMeta("HandheldFriendly");?>
	<?$APPLICATION->ShowMeta("apple-mobile-web-app-capable", "yes");?>
	<?$APPLICATION->ShowMeta("apple-mobile-web-app-status-bar-style");?>
	<?$APPLICATION->ShowMeta("SKYPE_TOOLBAR");?>
	<?$APPLICATION->ShowHead();?>
	<?$APPLICATION->AddHeadString('<script>BX.message('.CUtil::PhpToJSObject( $MESS, false ).')</script>', true);?>
	<?if($bIncludedModule)
		CMax::Start(SITE_ID);?>
	<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/header_include/head.php'));?>
<link rel="canonical" href="https://<?=SITE_SERVER_NAME.$APPLICATION->GetCurPage()?>">
<?if (($APPLICATION->GetCurDir() == '/stream/') || ($APPLICATION->GetCurDir() == '/report/analytics/')) {?>
	<meta name="robots" content="noindex, nofollow">
<?}?>
<script>
$(document).ready(function() {
    if (window.innerWidth <= 768) {
        function updateBonusText() {
            $(".bonus-info-text").text("Кэшбэк");
        }
        updateBonusText();
        $(document).on("ajaxComplete", function() {
            updateBonusText();
        });
        $(".load-more-button").on("click", function() {
            $.ajax({
                url: "/ajax/getAjaxBasket.php",
                method: "GET",
                success: function(response) {
                    $(".products-container").append(response);
                    updateBonusText();
                },
                error: function() {
                    console.error("Ошибка загрузки товаров.");
                }
            });
        });
    }
});


$(document).ready(function() {
    if (window.innerWidth <= 768) {
        function hideBonusInfo() {
            $('[data-product_type="1"] .bonus-info').css('display', 'none');
        }
        hideBonusInfo();
        $(document).on("ajaxComplete", function() {
            hideBonusInfo();
        });
        $(".load-more-button").on("click", function() {
            $.ajax({
                url: "/ajax/getAjaxBasket.php",
                method: "GET",
                success: function(response) {
                    $(".products-container").append(response);
                    hideBonusInfo();
                },
                error: function() {
                    console.error("Ошибка загрузки товаров.");
                }
            });
        });
    }
});

</script>
</head>
<?$bIndexBot = $bIncludedModule ? CMax::checkIndexBot() : false;?>
<body class="<?=($bIndexBot ? "wbot" : "");?> site_<?=SITE_ID?> <?=($bIncludedModule ? CMax::getCurrentBodyClass() : '')?>" id="main" data-site="<?=SITE_DIR?>">

	<?if(!$bIncludedModule):?>
		<?$APPLICATION->SetTitle(GetMessage("ERROR_INCLUDE_MODULE_ASPRO_MAX_TITLE"));?>
		<center><?$APPLICATION->IncludeFile(SITE_DIR."include/error_include_module.php");?></center></body></html><?die();?>
	<?endif;?>
	
	<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/header_include/body_top.php'));?>

	<?$arTheme = $APPLICATION->IncludeComponent("aspro:theme.max", ".default", array("COMPONENT_TEMPLATE" => ".default"), false, array("HIDE_ICONS" => "Y"));?>
	<?include_once('defines.php');?>
	<?CMax::SetJSOptions();?>

	<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/header_include/under_wrapper1.php'));?>
	<div class="wrapper1 <?=($isIndex && $isShowIndexLeftBlock ? "with_left_block" : "");?> <?=CMax::getCurrentPageClass();?> <?$APPLICATION->AddBufferContent(array('CMax', 'getCurrentThemeClasses'))?>  ">
		<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/header_include/top_wrapper1.php'));?>

		<div class="wraps hover_<?=$arTheme["HOVER_TYPE_IMG"]["VALUE"];?>" id="content">
			<?include_once(str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'].'/'.SITE_DIR.'include/header_include/top_wraps.php'));?>

			<?if($isIndex):?>
				<?$APPLICATION->ShowViewContent('front_top_big_banner');?>
				<div class="wrapper_inner front <?=($isShowIndexLeftBlock ? "" : "wide_page");?> <?=$APPLICATION->ShowViewContent('wrapper_inner_class')?>">
			<?elseif(!$isWidePage):?>
				<div class="wrapper_inner <?=($isHideLeftBlock ? "wide_page" : "");?> <?=$APPLICATION->ShowViewContent('wrapper_inner_class')?>">
			<?endif;?>
			
				<div class="container_inner flexbox flexbox--row-reverse flexbox--gap flexbox--gap-32 flexbox--align-start flexbox--justify-space-between <?=$APPLICATION->ShowViewContent('container_inner_class')?>">
				<?if(($isIndex && ($isShowIndexLeftBlock || $bActiveTheme)) || (!$isIndex && !$isHideLeftBlock)):?>
					<div class="right_block <?=(defined("ERROR_404") ? "error_page" : "");?> wide_<?=CMax::ShowPageProps("HIDE_LEFT_BLOCK");?> <?=$APPLICATION->ShowViewContent('right_block_class')?>">
				<?endif;?>

					<div class="middle <?=($is404 ? 'error-page' : '');?> <?=$APPLICATION->ShowViewContent('middle_class')?>">

						<?CMax::get_banners_position('CONTENT_TOP');?>

						<?if(!$isIndex):?>
							<div class="container">
								
								<?if($isHideLeftBlock && !$isWidePage):?>
									<div class="maxwidth-theme">
								<?endif;?>
						<?endif;?>

						<?CMax::checkRestartBuffer();?>