<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"main", 
	array(
		"IBLOCK_TYPE" => "aspro_max_catalog",
		"IBLOCK_ID" => "42",
		"HIDE_NOT_AVAILABLE" => "N",
		"BASKET_URL" => "/basket/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "MAX_SMART_FILTER",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "IN_STOCK",
			1 => "CML2_ARTICLE",
			2 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "BASE",
		),
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "COLOR",
			2 => "CML2_LINK",
			3 => "",
		),
		"USE_REVIEW" => "N",
		"MESSAGES_PER_PAGE" => "5",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "9",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "Y",
		"POST_FIRST_MESSAGE" => "N",
		"USE_COMPARE" => "Y",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_FIELD_CODE" => array(
			0 => "NAME",
			1 => "TAGS",
			2 => "SORT",
			3 => "PREVIEW_PICTURE",
			4 => "",
		),
		"COMPARE_PROPERTY_CODE" => array(
			0 => "BRAND",
			1 => "CML2_ARTICLE",
			2 => "CML2_BASE_UNIT",
			3 => "PROP_2033",
			4 => "COLOR_REF2",
			5 => "PROP_159",
			6 => "PROP_2052",
			7 => "PROP_2053",
			8 => "PROP_2083",
			9 => "PROP_2065",
			10 => "PROP_2054",
			11 => "PROP_2017",
			12 => "PROP_2026",
			13 => "PROP_2027",
			14 => "PROP_2049",
			15 => "PROP_2044",
			16 => "PROP_162",
			17 => "CML2_MANUFACTURER",
			18 => "PROP_2055",
			19 => "PROP_2069",
			20 => "PROP_2062",
			21 => "PROP_2061",
			22 => "",
		),
		"COMPARE_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"COMPARE_OFFERS_PROPERTY_CODE" => array(
			0 => "ARTICLE",
			1 => "VOLUME",
			2 => "SIZES",
			3 => "COLOR_REF",
			4 => "",
		),
		"COMPARE_ELEMENT_SORT_FIELD" => "shows",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => "",
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"OFFERS_CART_PROPERTIES" => "",
		"SHOW_TOP_ELEMENTS" => "Y",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_TOP_DEPTH" => "2",
		"SECTIONS_LIST_PREVIEW_PROPERTY" => "UF_SECTION_DESCR",
		"SHOW_SECTION_LIST_PICTURES" => "Y",
		"PAGE_ELEMENT_COUNT" => "20",
		"LINE_ELEMENT_COUNT" => "3",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "sort",
		"ELEMENT_SORT_ORDER2" => "asc",
		"LIST_PROPERTY_CODE" => array(
			0 => "HIT",
			1 => "BRAND",
			2 => "CML2_ARTICLE",
			3 => "PROP_2104",
			4 => "PODBORKI",
			5 => "PROP_2033",
			6 => "COLOR_REF2",
			7 => "PROP_305",
			8 => "PROP_352",
			9 => "PROP_317",
			10 => "PROP_357",
			11 => "PROP_2102",
			12 => "PROP_318",
			13 => "PROP_159",
			14 => "PROP_349",
			15 => "PROP_327",
			16 => "PROP_2052",
			17 => "PROP_370",
			18 => "PROP_336",
			19 => "PROP_2115",
			20 => "PROP_346",
			21 => "PROP_2120",
			22 => "PROP_2053",
			23 => "PROP_363",
			24 => "PROP_320",
			25 => "PROP_2089",
			26 => "PROP_325",
			27 => "PROP_2103",
			28 => "PROP_2085",
			29 => "PROP_300",
			30 => "PROP_322",
			31 => "PROP_362",
			32 => "PROP_365",
			33 => "PROP_359",
			34 => "PROP_284",
			35 => "PROP_364",
			36 => "PROP_356",
			37 => "PROP_343",
			38 => "PROP_2083",
			39 => "PROP_314",
			40 => "PROP_348",
			41 => "PROP_316",
			42 => "PROP_350",
			43 => "PROP_333",
			44 => "PROP_332",
			45 => "PROP_360",
			46 => "PROP_353",
			47 => "PROP_347",
			48 => "PROP_25",
			49 => "PROP_2114",
			50 => "PROP_301",
			51 => "PROP_2101",
			52 => "PROP_2067",
			53 => "PROP_323",
			54 => "PROP_324",
			55 => "PROP_355",
			56 => "PROP_304",
			57 => "PROP_358",
			58 => "PROP_319",
			59 => "PROP_344",
			60 => "PROP_328",
			61 => "PROP_338",
			62 => "PROP_2065",
			63 => "PROP_366",
			64 => "PROP_302",
			65 => "PROP_303",
			66 => "PROP_2054",
			67 => "PROP_341",
			68 => "PROP_223",
			69 => "PROP_283",
			70 => "PROP_354",
			71 => "PROP_313",
			72 => "PROP_2066",
			73 => "PROP_329",
			74 => "PROP_342",
			75 => "PROP_367",
			76 => "PROP_2084",
			77 => "PROP_340",
			78 => "PROP_351",
			79 => "PROP_368",
			80 => "PROP_369",
			81 => "PROP_331",
			82 => "PROP_337",
			83 => "PROP_345",
			84 => "PROP_339",
			85 => "PROP_310",
			86 => "PROP_309",
			87 => "PROP_330",
			88 => "PROP_2017",
			89 => "PROP_335",
			90 => "PROP_321",
			91 => "PROP_308",
			92 => "PROP_206",
			93 => "PROP_334",
			94 => "PROP_2100",
			95 => "PROP_311",
			96 => "PROP_2132",
			97 => "SHUM",
			98 => "PROP_361",
			99 => "PROP_326",
			100 => "PROP_315",
			101 => "PROP_2091",
			102 => "PROP_2026",
			103 => "PROP_307",
			104 => "PROP_2027",
			105 => "PROP_2098",
			106 => "PROP_2122",
			107 => "PROP_24",
			108 => "PROP_2049",
			109 => "PROP_22",
			110 => "PROP_2095",
			111 => "PROP_2044",
			112 => "PROP_162",
			113 => "PROP_2055",
			114 => "PROP_2069",
			115 => "PROP_2062",
			116 => "PROP_2061",
			117 => "CML2_LINK",
			118 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "CML2_LINK",
			2 => "DETAIL_PAGE_URL",
			3 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "ARTICLE",
			1 => "SPORT",
			2 => "SIZES2",
			3 => "MORE_PHOTO",
			4 => "VOLUME",
			5 => "SIZES",
			6 => "SIZES5",
			7 => "SIZES4",
			8 => "SIZES3",
			9 => "COLOR_REF",
			10 => "",
		),
		"LIST_OFFERS_LIMIT" => "10",
		"SORT_BUTTONS" => array(
			0 => "POPULARITY",
			1 => "NAME",
			2 => "PRICE",
		),
		"SORT_PRICES" => "REGION_PRICE",
		"DEFAULT_LIST_TEMPLATE" => "block",
		"SECTION_DISPLAY_PROPERTY" => "UF_SECTION_TEMPLATE",
		"LIST_DISPLAY_POPUP_IMAGE" => "Y",
		"SECTION_PREVIEW_PROPERTY" => "DESCRIPTION",
		"SHOW_SECTION_PICTURES" => "Y",
		"SHOW_SECTION_SIBLINGS" => "Y",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "BRAND",
			1 => "LINK_SALE",
			2 => "EXPANDABLES",
			3 => "CML2_ARTICLE",
			4 => "LINK_VACANCY",
			5 => "VIDEO_YOUTUBE",
			6 => "POPUP_VIDEO",
			7 => "RECOMMEND",
			8 => "LINK_NEWS",
			9 => "ASSOCIATED",
			10 => "VIDEO",
			11 => "LINK_STAFF",
			12 => "LINK_BLOG",
			13 => "NEW",
			14 => "SERVICES",
			15 => "CML2_ATTRIBUTES",
			16 => "COLOR_REF2",
			17 => "LINK_REVIEWS",
			18 => "STOCK",
			19 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "DETAIL_PAGE_URL",
			4 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "FRAROMA",
			1 => "ARTICLE",
			2 => "WEIGHT",
			3 => "SPORT",
			4 => "VLAGOOTVOD",
			5 => "AGE",
			6 => "SIZES2",
			7 => "RUKAV",
			8 => "KAPUSHON",
			9 => "FRCOLLECTION",
			10 => "FRLINE",
			11 => "FRFITIL",
			12 => "VOLUME",
			13 => "FRMADEIN",
			14 => "FRELITE",
			15 => "SIZES",
			16 => "SIZES5",
			17 => "SIZES4",
			18 => "SIZES3",
			19 => "TALL",
			20 => "FRFAMILY",
			21 => "FRSOSTAVCANDLE",
			22 => "FRTYPE",
			23 => "FRFORM",
			24 => "COLOR_REF",
			25 => "",
		),
		"PROPERTIES_DISPLAY_LOCATION" => "TAB",
		"SHOW_BRAND_PICTURE" => "Y",
		"SHOW_ASK_BLOCK" => "N",
		"ASK_FORM_ID" => "2",
		"SHOW_ADDITIONAL_TAB" => "N",
		"PROPERTIES_DISPLAY_TYPE" => "TABLE",
		"SHOW_KIT_PARTS" => "Y",
		"SHOW_KIT_PARTS_PRICES" => "Y",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "Y",
		"ALSO_BUY_ELEMENT_COUNT" => "5",
		"ALSO_BUY_MIN_BUYES" => "2",
		"USE_STORE" => "N",
		"USE_STORE_PHONE" => "Y",
		"USE_STORE_SCHEDULE" => "Y",
		"USE_MIN_AMOUNT" => "N",
		"MIN_AMOUNT" => "10",
		"STORE_PATH" => "/contacts/stores/#store_id#/",
		"MAIN_TITLE" => "Наличие на складах",
		"MAX_AMOUNT" => "20",
		"USE_ONLY_MAX_AMOUNT" => "Y",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "sort",
		"OFFERS_SORT_ORDER2" => "asc",
		"PAGER_TEMPLATE" => "main",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"IBLOCK_STOCK_ID" => "40",
		"IBLOCK_LINK_NEWS_ID" => "36",
		"IBLOCK_SERVICES_ID" => "38",
		"IBLOCK_TIZERS_ID" => "26",
		"IBLOCK_LINK_REVIEWS_ID" => "35",
		"STAFF_IBLOCK_ID" => "32",
		"VACANCY_IBLOCK_ID" => "18",
		"SHOW_QUANTITY" => "Y",
		"SHOW_MEASURE" => "N",
		"SHOW_QUANTITY_COUNT" => "Y",
		"USE_RATING" => "Y",
		"DISPLAY_WISH_BUTTONS" => "Y",
		"DEFAULT_COUNT" => "1",
		"SHOW_HINTS" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"USER_FIELDS" => array(
			0 => "",
			1 => "UF_CATALOG_ICON",
			2 => "",
		),
		"FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"TOP_ELEMENT_COUNT" => "8",
		"TOP_LINE_ELEMENT_COUNT" => "4",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_FIELD2" => "sort",
		"TOP_ELEMENT_SORT_ORDER2" => "asc",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPONENT_TEMPLATE" => "main",
		"DETAIL_SET_CANONICAL_URL" => "Y",
		"SHOW_DEACTIVATED" => "N",
		"TOP_OFFERS_FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"TOP_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_OFFERS_LIMIT" => "10",
		"SECTION_TOP_BLOCK_TITLE" => "Лучшие предложения",
		"OFFER_TREE_PROPS" => array(
			0 => "PROPERTY_15",
			1 => "PROPERTY_16",
			2 => "PROPERTY_19",
			3 => "PROPERTY_21",
			4 => "PROPERTY_32",
		),
		"USE_BIG_DATA" => "Y",
		"BIG_DATA_RCM_TYPE" => "bestsell",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"VIEWED_ELEMENT_COUNT" => "20",
		"VIEWED_BLOCK_TITLE" => "Ранее вы смотрели",
		"ELEMENT_SORT_FIELD_BOX" => "name",
		"ELEMENT_SORT_ORDER_BOX" => "asc",
		"ELEMENT_SORT_FIELD_BOX2" => "id",
		"ELEMENT_SORT_ORDER_BOX2" => "desc",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"MAX_GALLERY_ITEMS" => "5",
		"SHOW_GALLERY" => "Y",
		"SHOW_PROPS" => "Y",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "Y",
		"SKU_DETAIL_ID" => "",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"AJAX_FILTER_CATALOG" => "Y",
		"AJAX_CONTROLS" => "Y",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DISPLAY_ELEMENT_SLIDER" => "10",
		"SHOW_ONE_CLICK_BUY" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "8",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"OFFER_HIDE_NAME_PROPS" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SECTIONS_LIST_PREVIEW_DESCRIPTION" => "Y",
		"SALE_STIKER" => "SALE_TEXT",
		"SHOW_DISCOUNT_TIME" => "Y",
		"SHOW_RATING" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_OFFERS_LIMIT" => "0",
		"DETAIL_EXPANDABLES_TITLE" => "С этим товаром покупают",
		"DETAIL_ASSOCIATED_TITLE" => "Вам также может понравиться",
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"DETAIL_LINKED_GOODS_TABS" => "Y",
		"DETAIL_PICTURE_MODE" => "MAGNIFIER",
		"SHOW_UNABLE_SKU_PROPS" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "Y",
		"COMPATIBLE_MODE" => "Y",
		"TEMPLATE_THEME" => "blue",
		"LABEL_PROP" => "",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"USE_SALE_BESTSELLERS" => "Y",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FILTER_HIDE_ON_MOBILE" => "N",
		"INSTANT_RELOAD" => "N",
		"COMPARE_POSITION_FIXED" => "Y",
		"COMPARE_POSITION" => "top left",
		"USE_RATIO_IN_RANGES" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
			0 => "BUY",
		),
		"TOP_PROPERTY_CODE_MOBILE" => "",
		"TOP_VIEW_MODE" => "SECTION",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"LIST_PROPERTY_CODE_MOBILE" => "",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_SHOW_SLIDER" => "Y",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => "",
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => "",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_BLOCKS_ORDER" => "complect,nabor,offers,tabs,services,news,blog,staff,vacancy,gifts,goods",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"LAZY_LOAD" => "N",
		"LOAD_ON_SCROLL" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"DETAIL_DOCS_PROP" => "INSTRUCTIONS",
		"STIKERS_PROP" => "HIT",
		"USE_SHARE" => "N",
		"TAB_OFFERS_NAME" => "",
		"TAB_DESCR_NAME" => "",
		"TAB_KOMPLECT_NAME" => "",
		"TAB_NABOR_NAME" => "",
		"TAB_CHAR_NAME" => "",
		"TAB_VIDEO_NAME" => "",
		"TAB_REVIEW_NAME" => "",
		"TAB_FAQ_NAME" => "",
		"TAB_STOCK_NAME" => "",
		"TAB_DOPS_NAME" => "",
		"BLOCK_SERVICES_NAME" => "",
		"BLOCK_DOCS_NAME" => "",
		"DIR_PARAMS" => CMax::GetDirMenuParametrs(__DIR__),
		"ELEMENT_DETAIL_TYPE_VIEW" => "FROM_MODULE",
		"SHOW_CHEAPER_FORM" => "N",
		"LANDING_TITLE" => "Популярные категории",
		"LANDING_SECTION_COUNT" => "10",
		"LANDING_SEARCH_TITLE" => "Похожие запросы",
		"LANDING_SEARCH_COUNT" => "7",
		"LIST_SECTIONS_TYPE_VIEW" => "sections_1",
		"LIST_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"CHEAPER_FORM_NAME" => "",
		"SECTIONS_TYPE_VIEW" => "FROM_MODULE",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"ELEMENT_TYPE_VIEW" => "FROM_MODULE",
		"LANDING_TYPE_VIEW" => "FROM_MODULE",
		"FILE_404" => "",
		"SHOW_MEASURE_WITH_RATIO" => "N",
		"SHOW_COUNTER_LIST" => "Y",
		"SHOW_DISCOUNT_TIME_EACH_SKU" => "N",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"SHOW_ARTICLE_SKU" => "Y",
		"USE_FILTER_PRICE" => "N",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"RESTART" => "Y",
		"USE_LANGUAGE_GUESS" => "N",
		"NO_WORD_LOGIC" => "Y",
		"SORT_REGION_PRICE" => "BASE",
		"SHOW_SECTION_DESC" => "Y",
		"USE_ADDITIONAL_GALLERY" => "Y",
		"ADDITIONAL_GALLERY_TYPE" => "BIG",
		"ADDITIONAL_GALLERY_PROPERTY_CODE" => "PHOTO_GALLERY",
		"ADDITIONAL_GALLERY_OFFERS_PROPERTY_CODE" => "-",
		"BLOCK_ADDITIONAL_GALLERY_NAME" => "",
		"STORES_FILTER" => "TITLE",
		"STORES_FILTER_ORDER" => "SORT_ASC",
		"VIEW_BLOCK_TYPE" => "N",
		"SHOW_HOW_BUY" => "N",
		"TITLE_HOW_BUY" => "Как купить",
		"SHOW_DELIVERY" => "Y",
		"TITLE_DELIVERY" => "Доставка",
		"SHOW_PAYMENT" => "Y",
		"TITLE_PAYMENT" => "Оплата",
		"SHOW_GARANTY" => "Y",
		"TITLE_GARANTY" => "Условия доставки",
		"TITLE_SLIDER" => "Рекомендуем",
		"SHOW_SEND_GIFT" => "Y",
		"SEND_GIFT_FORM_NAME" => "",
		"BLOCK_LANDINGS_NAME" => "",
		"BLOG_IBLOCK_ID" => "33",
		"BLOCK_BLOG_NAME" => "",
		"RECOMEND_COUNT" => "5",
		"VISIBLE_PROP_COUNT" => "0",
		"BIGDATA_EXT" => "bigdata_1",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "Y",
		"ALT_TITLE_GET" => "NORMAL",
		"BUNDLE_ITEMS_COUNT" => "3",
		"SHOW_LANDINGS_SEARCH" => "Y",
		"SHOW_LANDINGS" => "Y",
		"LANDING_POSITION" => "BEFORE_PRODUCTS",
		"USE_DETAIL_PREDICTION" => "Y",
		"SECTION_BG" => "UF_SECTION_BG_IMG",
		"OFFER_SHOW_PREVIEW_PICTURE_PROPS" => array(
		),
		"LANDING_IBLOCK_ID" => "45",
		"DETAIL_BLOCKS_TAB_ORDER" => "desc,char,stores,video,reviews,buy,payment,delivery,custom_tab",
		"DETAIL_BLOCKS_ALL_ORDER" => "complect,goods,nabor,offers,desc,char,buy,payment,delivery,video,stores,custom_tab,services,news,blog,reviews,staff,vacancy,gifts",
		"DELIVERY_CALC" => "Y",
		"DELIVERY_CALC_NAME" => "",
		"ASK_TAB" => "",
		"TAB_NEWS_NAME" => "",
		"TAB_STAFF_NAME" => "",
		"TAB_VACANCY_NAME" => "",
		"STAFF_VIEW_TYPE" => "staff_block",
		"SECTION_TYPE_VIEW" => "FROM_MODULE",
		"SHOW_BUY_DELIVERY" => "Y",
		"TITLE_BUY_DELIVERY" => "Условия оплаты",
		"BLOG_URL" => "u1-blog-s1",
		"LANDING_SEARCH_COUNT_MOBILE" => "3",
		"USE_BIG_DATA_IN_SEARCH" => "N",
		"SHOW_MORE_SUBSECTIONS" => "Y",
		"SHOW_SIDE_BLOCK_LAST_LEVEL" => "N",
		"SHOW_SORT_IN_FILTER" => "Y",
		"SUBSECTION_PREVIEW_PROPERTY" => "DESCRIPTION",
		"SHOW_SUBSECTION_DESC" => "Y",
		"LANDING_SECTION_COUNT_MOBILE" => "3",
		"SHOW_SMARTSEO_TAGS" => "Y",
		"SHOW_SKU_DESCRIPTION" => "N",
		"MODULES_ELEMENT_COUNT" => "10",
		"USE_CUSTOM_RESIZE" => "N",
		"DETAIL_SET_PRODUCT_TITLE" => "Собрать комплект",
		"DISPLAY_LINKED_PAGER" => "Y",
		"LINKED_ELEMENT_TAB_SORT_FIELD" => "sort",
		"LINKED_ELEMENT_TAB_SORT_ORDER" => "asc",
		"LINKED_ELEMENT_TAB_SORT_FIELD2" => "id",
		"LINKED_ELEMENT_TAB_SORT_ORDER2" => "desc",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "Y",
		"MAX_IMAGE_SIZE" => "5",
		"TAB_BUY_SERVICES_NAME" => "",
		"VISIBLE_PROP_WITH_OFFER" => "N",
		"COUNT_SERVICES_IN_ANNOUNCE" => "2",
		"SHOW_ALL_SERVICES_IN_SLIDE" => "N",
		"BIGDATA_SHOW_FROM_SECTION" => "N",
		"SMARTSEO_TAGS_COUNT" => "10",
		"SMARTSEO_TAGS_COUNT_MOBILE" => "3",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "catalog/",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#",
			"compare" => "catalog/compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>