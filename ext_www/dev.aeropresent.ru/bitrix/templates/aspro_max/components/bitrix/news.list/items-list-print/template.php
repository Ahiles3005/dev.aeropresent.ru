<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->addExternalCss($this->GetFolder() . '/swiper.css');
?>

<div class="row">
    <div class="col-sm-11 col-xs-11">
        <h2 class="tables-block__h2"><?= $arResult['NAME'] ?></h2>
    </div>
    <div class="col-sm-1  col-xs-1 swiper-nav">

    </div>
</div>
<style>
    .tables-block .tables-block__h2{
        margin-bottom: 0;
    }
    .table_page .swiper-button-next,
    .table_page .swiper-button-prev{
        border: 1px solid #2196E0;
        box-sizing: border-box;
        border-radius: 2px;
    }
    .table_page .swiper-button-next:after,
    .table_page .swiper-button-prev:after{
        font-size: 10px;
        font-weight: bold;
        line-height: 30px;
        color: black;
    }
    .table_page .swiper-nav{
        position: relative;
        height: 32px;
        background-color: #fff;
    }
    .table_page .swiper-nav .swiper-button-next{
        right: 20px;
        left: unset;
        margin-top: 0;
        height: 32px;
        width: 32px;
        top: unset;

    }
    .table_page .swiper-nav .swiper-button-prev{
        right: 64px;
        left: unset;
        margin-top: 0;
        height: 32px;
        width: 32px;
        top: unset;
    }
</style>
<div class="swiper-container">
    <? if (isset($arResult['ITEMS']) && count($arResult['ITEMS'])) {
        ?>
        <div class="swiper-wrapper">
            <? foreach ($arResult['ITEMS'] as $arItems) {
                ?>
                <div class="swiper-slide">
                    <img src="<?= $arItems['DETAIL_PICTURE']['SRC'] ?>">
                </div>
            <? } ?>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    <? } ?>
</div>


<!-- Swiper JS -->
<? $this->addExternalJS($this->GetFolder() . '/swiper.min.js'); ?>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        mousewheel: true,
        keyboard: true,
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Функция для проверки ширины экрана и переноса элементов
        function checkScreenWidthAndTransferElements() {
            const screenWidth = window.innerWidth;

            // Находим элементы
            const swiperContainer = document.querySelector('.swiper-container');
            const swiperNav = document.querySelector('.swiper-nav');
            const swiperButtonNext = document.querySelector('.swiper-button-next');
            const swiperButtonPrev = document.querySelector('.swiper-button-prev');

            if (screenWidth <= 768) {
                // Переносим элементы в swiper-nav
                if (swiperButtonNext && swiperButtonPrev) {
                    swiperNav.appendChild(swiperButtonNext);
                    swiperNav.appendChild(swiperButtonPrev);
                }
            } else {
                // Переносим элементы обратно в swiper-container
                if (swiperButtonNext && swiperButtonPrev) {
                    swiperContainer.insertBefore(swiperButtonNext, swiperContainer.firstChild);
                    swiperContainer.insertBefore(swiperButtonPrev, swiperContainer.firstChild);
                }
            }
        }

        // Вызываем функцию при загрузке страницы
        checkScreenWidthAndTransferElements();

        // Вызываем функцию при изменении размера окна
        window.addEventListener('resize', checkScreenWidthAndTransferElements);
    });
</script>