<?
use \Bitrix\Main\Localization\Loc;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();
$this->setFrameMode(true);
?>

<?php if($arResult['DETAIL_TEXT']):?>
	<div class="tab__description">
		<?=$arResult['DETAIL_TEXT']?>
	</div>
<?php endif; ?>
