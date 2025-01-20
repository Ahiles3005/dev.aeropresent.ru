<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>
<?if($arResult['ITEMS']):?>
<div class="gal_grid row">
	<?foreach($arResult['ITEMS'] as $arItem):?>
	<div class="gal_grid_item col-xs-12 col-md-3">
		<div class="overflow_photo">
			<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="gal fancy" data-fancybox="gallery">
				<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC_SMALL"]?>" alt="">
			</a>
		</div>
	</div>
	<?endforeach;?>
</div>
<?endif;?>
