<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"front_stories", 
	array(
		"VIEW_TYPE" => "ROUND",
		"FRONT_PAGE" => "Y",
		"IBLOCK_TYPE" => "aspro_max_content",
		"IBLOCK_ID" => "49",
		"COMPONENT_TEMPLATE" => "front_stories",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"CACHE_FILTER" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"TITLE_BLOCK" => "Мультгерои топ-10",
		"TITLE_BLOCK_ALL" => "Все мультгерои",
		"ALL_URL" => "geroi-multfilmov/",
		"TITLE_BLOCK_SHOW" => "N",
		"SORT" => "SORT",
		"SORT_ORDER" => "ASC",
		"SORT_2" => "ID",
		"SORT_ORDER_2" => "ASC"
	),
	false
);?>