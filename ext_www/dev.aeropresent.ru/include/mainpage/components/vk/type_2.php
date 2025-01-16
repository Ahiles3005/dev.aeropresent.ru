<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	define("STATISTIC_SKIP_ACTIVITY_CHECK", "true");
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
}?>
<?$APPLICATION->IncludeComponent("aspro:wrapper.block.max", "front_vk1", Array(
	"COMPONENT_TEMPLATE" => "front_vk",
		"VIEW_TYPE" => "SQUARE",	// Вид блока
		"WIDE_BLOCK" => "N",	// Блок на всю ширину
		"NO_MARGIN" => "N",	// Не использовать отступ между блоками
		"LINE_ELEMENT_COUNT" => "4",	// Количество элементов в строке
		"PAGE_ELEMENT_COUNT" => "4",	// Количество отображаемых элементов
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "86400",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>