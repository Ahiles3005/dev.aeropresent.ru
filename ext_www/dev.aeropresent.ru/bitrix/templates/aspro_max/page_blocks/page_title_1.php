<div class="top-block-wrapper">
	<div class="pagetitle_img">&nbsp;</div>
	<section class="page-top maxwidth-theme <?CMax::ShowPageProps('TITLE_CLASS');?>">
		<div id="navigation">
			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", array(
				"START_FROM" => "0",
				"PATH" => "",
				"SITE_ID" => SITE_ID,
				"SHOW_SUBSECTIONS" => "N"
				),
				false
			);?>
		</div>
		<?$APPLICATION->ShowViewContent('section_bnr_h1_content');?>
		<div class="topic">
			<div class="topic__inner">
				<?=$APPLICATION->ShowViewContent('product_share')?>
				<div class="topic__heading">
					<h1 id="pagetitle"><?$APPLICATION->ShowTitle(false)?></h1><?$APPLICATION->ShowViewContent('more_text_title');?>
				</div>
			</div>
		</div>
	</section>
</div>