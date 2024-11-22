<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<div class="full__order__wrapper">
    <div class="full__order__left">
        <div class="full__order__left__border">    
            <div class="full__order__left__method">
                <div id="chosen__method__shipping" class="full__order__left__method__item left__method__active">
                    <h2>Оформить доставку</h2>
                    <svg width="113" height="107" viewBox="0 0 113 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M103.062 80.9638C102.898 81.7864 102.039 82.4559 101.16 82.4559H102.285C102.448 78.4961 99.4015 75.4544 94.9846 75.4544C90.5677 75.4544 86.2325 78.4961 84.7397 82.4559H48.4023C48.5658 78.4961 45.519 75.4544 41.102 75.4544C36.6851 75.4544 32.35 78.4961 30.8572 82.4559H23.3525C22.4732 82.4559 21.9006 81.7864 22.0847 80.9638L24.7021 68.5868C29.2213 71.1693 34.5175 72.6615 40.2023 72.6615C48.4023 72.6615 55.8047 69.5624 61.1827 64.5313C66.0291 59.9975 69.2191 53.8951 69.7712 47.104H86.3143C87.5208 47.104 88.4819 47.7544 88.7682 48.7874L89.3816 51.1213H76.3762C74.7812 51.1213 73.2271 52.3456 72.8999 53.8377L71.6321 59.8062C70.9982 62.8479 73.1044 65.3156 76.3557 65.3156H94.0235L99.831 67.9555L103.9 69.8111C104.677 70.1937 105.148 71.3415 104.923 72.3363L103.103 80.9638H103.062Z" fill="#EAF2FC"/>
                        <path d="M93.7782 81.2314C92.2854 81.2314 90.8335 82.3792 90.5268 83.7757C90.2405 85.1722 91.2016 86.32 92.6944 86.32C94.1871 86.32 95.639 85.1722 95.9457 83.7757C96.232 82.3792 95.2709 81.2314 93.7782 81.2314Z" fill="#0EA5E5"/>
                        <path d="M39.8751 81.2314C38.3824 81.2314 36.9305 82.3792 36.6238 83.7757C36.3375 85.1722 37.2986 86.32 38.7914 86.32C40.2841 86.32 41.736 85.1722 42.0427 83.7757C42.329 82.3792 41.3679 81.2314 39.8751 81.2314Z" fill="#0EA5E5"/>
                        <path d="M108.644 64.6651L99.2175 60.38L94.9028 45.057C94.3507 43.1057 92.5103 41.8623 90.22 41.8623H57.8496C57.0726 41.8623 56.3159 42.4553 56.1728 43.1823C56.0297 43.9092 56.5204 44.5022 57.2975 44.5022H89.6679C90.8744 44.5022 91.8355 45.1526 92.1218 46.1856L92.8784 48.883H79.648C78.053 48.883 76.4989 50.1073 76.1717 51.5994L74.9857 57.2044C74.3518 60.2461 76.458 62.7138 79.7094 62.7138H97.3771L105.332 66.3294L105.086 66.4633C103.634 67.2093 102.53 68.5484 102.223 69.9832L101.671 72.604C101.528 73.3309 102.019 73.9239 102.796 73.9239H107.377L106.743 76.9082H105.148C104.371 76.9082 103.614 77.5012 103.471 78.2281C103.328 78.9551 103.818 79.5481 104.596 79.5481H106.191L105.884 81.0402C105.72 81.8628 104.861 82.5323 103.982 82.5323H102.285C102.448 78.5725 99.4015 75.5308 94.9846 75.5308C90.5677 75.5308 86.2325 78.5725 84.7398 82.5323H48.4023C48.5659 78.5725 45.519 75.5308 41.1021 75.5308C36.6851 75.5308 32.35 78.5725 30.8572 82.5323H26.154C25.2747 82.5323 24.7021 81.8628 24.8862 81.0402L25.1929 79.5481H29.7734C30.5505 79.5481 31.3071 78.9551 31.4502 78.2281C31.5934 77.5012 31.1026 76.9082 30.3255 76.9082H25.745L26.6448 72.6231C25.7655 72.2787 24.9066 71.877 24.0887 71.437L22.0642 81.0211C21.5939 83.2975 23.1685 85.134 25.6019 85.134H30.3051C30.1415 89.0939 33.1884 92.1355 37.6053 92.1355C42.0222 92.1355 46.3574 89.0939 47.8706 85.134H84.2081C84.0445 89.0939 87.0914 92.1355 91.5083 92.1355C95.9252 92.1355 100.26 89.0939 101.774 85.134H103.471C105.904 85.134 108.256 83.2975 108.747 81.0211L111.119 69.7536C111.589 67.5728 110.628 65.6024 108.685 64.7225L108.644 64.6651ZM93.635 51.4846L96.0479 60.0548H83.1857L85.0056 51.4846H93.635ZM38.1574 89.4765C34.8038 89.4765 32.6158 86.9322 33.2702 83.7949C33.9245 80.6576 37.1963 78.1133 40.5499 78.1133C43.9035 78.1133 46.0916 80.6576 45.4372 83.7949C44.7828 86.9322 41.511 89.4765 38.1574 89.4765ZM92.04 89.4765C88.6864 89.4765 86.4984 86.9322 87.1527 83.7949C87.8071 80.6576 91.0789 78.1133 94.4325 78.1133C97.7861 78.1133 99.9741 80.6576 99.3197 83.7949C98.6654 86.9322 95.3936 89.4765 92.04 89.4765ZM82.1837 51.4846L80.3637 60.0548H80.2615C78.5642 60.0548 77.4395 58.754 77.7872 57.1662L78.9732 51.5611C78.9732 51.5037 79.0345 51.4655 79.0754 51.4655H82.1632L82.1837 51.4846ZM107.949 71.2649H104.759L105.045 69.9449C105.148 69.4284 105.557 68.9502 106.088 68.6823L107.888 67.7641C108.276 68.2806 108.44 68.9693 108.276 69.6962L107.949 71.2649Z" fill="#0EA5E5"/>
                        <path d="M84.2081 76.8508H51.2651C50.4881 76.8508 49.7314 77.4439 49.5883 78.1708C49.4452 78.8977 49.9359 79.4907 50.713 79.4907H83.656C84.433 79.4907 85.1896 78.8977 85.3328 78.1708C85.4759 77.4439 84.9852 76.8508 84.2081 76.8508Z" fill="#0EA5E5"/>
                        <path d="M2.76059 61.3173C2.24937 61.3173 1.81995 60.9156 1.81995 60.4373C1.81995 59.9591 2.24937 59.5574 2.76059 59.5574H26.154C26.6652 59.5574 27.0946 59.9591 27.0946 60.4373C27.0946 60.9156 26.6652 61.3173 26.154 61.3173H2.76059Z" fill="#0EA5E5"/>
                        <path d="M10.3062 66.8268C9.79496 66.8268 9.36554 66.4251 9.36554 65.9469C9.36554 65.4686 9.79496 65.0669 10.3062 65.0669H41.6133C42.1245 65.0669 42.5539 65.4686 42.5539 65.9469C42.5539 66.4251 42.1245 66.8268 41.6133 66.8268H10.3062Z" fill="#0EA5E5"/>
                        <path d="M40.1614 17.1658C48.3614 17.1658 55.7638 20.2648 61.1419 25.296C65.3543 29.2367 68.299 34.3635 69.3827 40.0833H66.4995C65.4566 35.0904 62.8391 30.6332 59.1379 27.1707C54.2915 22.6369 47.5639 19.8248 40.1614 19.8248C32.759 19.8248 26.0313 22.6369 21.1849 27.1707C16.3386 31.7044 13.3326 37.9982 13.3326 44.9232C13.3326 49.6291 14.7231 54.029 17.1156 57.7975H13.8847C11.7376 53.9524 10.5107 49.5717 10.5107 44.9232C10.5107 37.2521 13.8234 30.3271 19.2014 25.296C24.559 20.2839 31.9819 17.1658 40.1819 17.1658H40.1614ZM31.1844 68.5868C33.9859 69.5241 37.0123 70.0215 40.1614 70.0215C47.5639 70.0215 54.2915 67.2094 59.1379 62.6757C63.6775 58.4288 66.6017 52.6516 66.9698 46.224H69.7917C69.4441 53.3594 66.1927 59.8062 61.1419 64.5312C55.7638 69.5624 48.3614 72.6614 40.1614 72.6614C34.4767 72.6614 29.1804 71.1693 24.6612 68.5868H31.1844Z" fill="#0EA5E5"/>
                        <path d="M24.1705 36.1425C23.7819 35.8173 23.741 35.2625 24.0682 34.8991C24.4158 34.5356 25.0089 34.4973 25.3974 34.8034L41.8996 48.1178C42.2881 48.443 42.329 48.9978 42.0018 49.3612C41.6542 49.7247 41.0612 49.763 40.6726 49.4569L24.1705 36.1425Z" fill="#0EA5E5"/>
                        <path d="M48.7908 40.8102C49.1589 40.4658 49.7519 40.485 50.12 40.8293C50.4881 41.1736 50.4676 41.7284 50.0996 42.0727L41.9609 49.4186C41.5929 49.7629 40.9998 49.7438 40.6318 49.3995C40.2637 49.0551 40.2841 48.5004 40.6522 48.156L48.7908 40.8102Z" fill="#0EA5E5"/>
                        <path d="M39.2208 27.3046V23.7847V22.0247C39.2208 21.5465 39.6502 21.1448 40.1614 21.1448C40.6726 21.1448 41.1021 21.5465 41.1021 22.0247V23.7847V27.3046C41.1021 27.7828 40.6726 28.1846 40.1614 28.1846C39.6502 28.1846 39.2208 27.7828 39.2208 27.3046Z" fill="#0EA5E5"/>
                        <path d="M19.6513 53.8378L17.9132 54.5073C17.4429 54.6986 16.8907 54.469 16.6863 54.0291C16.4818 53.5891 16.7272 53.0726 17.1975 52.8813L18.9356 52.2117C19.4059 52.0204 19.9581 52.25 20.1625 52.69C20.367 53.13 20.1217 53.6465 19.6513 53.8378Z" fill="#0EA5E5"/>
                        <path d="M17.5655 44.0432H15.6842C15.173 44.0432 14.7436 44.4449 14.7436 44.9232C14.7436 45.4014 15.173 45.8032 15.6842 45.8032H17.5655H21.3281C21.8393 45.8032 22.2687 45.4014 22.2687 44.9232C22.2687 44.4449 21.8393 44.0432 21.3281 44.0432H17.5655Z" fill="#0EA5E5"/>
                        <path d="M55.4776 29.3515L56.8068 28.1081C57.1748 27.7638 57.7679 27.7638 58.1359 28.1081C58.504 28.4524 58.504 29.0072 58.1359 29.3515L56.8068 30.595C56.4387 30.9393 55.8457 30.9393 55.4776 30.595C55.1095 30.2506 55.1095 29.6959 55.4776 29.3515Z" fill="#0EA5E5"/>
                        <path d="M24.8453 29.3515L23.5161 28.1081C23.148 27.7638 22.555 27.7638 22.1869 28.1081C21.8189 28.4524 21.8189 29.0072 22.1869 29.3515L23.5161 30.595C23.8842 30.9393 24.4772 30.9393 24.8453 30.595C25.2134 30.2506 25.2134 29.6959 24.8453 29.3515Z" fill="#0EA5E5"/>
                        <path d="M60.692 36.0087L62.4301 35.3392C62.9005 35.1479 63.4526 35.3774 63.6571 35.8174C63.8615 36.2574 63.6162 36.7739 63.1458 36.9652L61.4077 37.6347C60.9374 37.826 60.3852 37.5965 60.1808 37.1565C59.9763 36.7165 60.2217 36.2 60.692 36.0087Z" fill="#0EA5E5"/>
                        <path d="M47.9524 25.0472L48.6681 23.4212C48.8726 22.9812 49.4247 22.7516 49.8951 22.9429C50.3654 23.1342 50.6108 23.6507 50.4063 24.0907L49.6906 25.7167C49.4861 26.1567 48.934 26.3863 48.4636 26.195C47.9933 26.0037 47.7479 25.4872 47.9524 25.0472Z" fill="#0EA5E5"/>
                        <path d="M32.3908 25.0472L31.6751 23.4212C31.4706 22.9812 30.9185 22.7516 30.4482 22.9429C29.9779 23.1342 29.7325 23.6507 29.937 24.0907L30.6527 25.7167C30.8572 26.1567 31.4093 26.3863 31.8796 26.195C32.3499 26.0037 32.5953 25.4872 32.3908 25.0472Z" fill="#0EA5E5"/>
                        <path d="M19.6513 36.0087L17.9132 35.3392C17.4429 35.1479 16.8907 35.3774 16.6863 35.8174C16.4818 36.2574 16.7272 36.7739 17.1975 36.9652L18.9356 37.6347C19.4059 37.826 19.9581 37.5965 20.1625 37.1565C20.367 36.7165 20.1217 36.2 19.6513 36.0087Z" fill="#0EA5E5"/>
                        <path d="M41.3066 47.0273C42.3495 47.0273 43.1879 47.8117 43.1879 48.7873C43.1879 49.7629 42.3495 50.5472 41.3066 50.5472C40.2637 50.5472 39.4253 49.7629 39.4253 48.7873C39.4253 47.8117 40.2637 47.0273 41.3066 47.0273Z" fill="#0EA5E5"/>
                        </svg>
                </div>
                <div id="chosen__method__pickup" class="full__order__left__method__item">
                    <h2>Самовывоз из магазина</h2>
                    <svg width="113" height="107" viewBox="0 0 113 107" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M76.8793 20.718C70.6878 20.718 65.0675 23.3683 61.0008 27.6643C56.8884 31.9817 54.3524 37.9448 54.3524 44.5491C54.3524 63.9559 74.1148 81.781 76.1939 83.6405L76.3538 83.7901C76.4224 83.8542 76.5138 83.9184 76.628 83.9611C76.7194 84.0038 76.8108 84.0038 76.9022 84.0038C77.0849 84.0038 77.2906 83.9397 77.4505 83.7901L77.6104 83.6405C79.6895 81.7597 99.4519 63.9559 99.4519 44.5491C99.4519 37.9661 96.9159 31.9817 92.8035 27.6643C88.7368 23.3683 83.1165 20.718 76.925 20.718H76.8793ZM88.8282 40.8301C88.7596 40.595 88.554 40.424 88.3027 40.4027L80.946 39.3768C80.5348 38.5646 77.6561 33.0289 77.6561 32.9862C77.5419 32.7725 77.3134 32.6442 77.0621 32.6442C76.8108 32.6442 76.5823 32.7725 76.4681 32.9862C76.4681 33.0289 73.5894 38.586 73.1781 39.3768L65.8215 40.4027C65.5702 40.4454 65.3645 40.595 65.296 40.8301C65.2275 41.0652 65.2732 41.3217 65.4559 41.4713L70.7792 46.4513L69.5227 53.4616C69.477 53.6968 69.5912 53.9319 69.7968 54.0815C70.0024 54.2311 70.2766 54.2525 70.5051 54.1242L77.0849 50.8114L83.6648 54.1242C83.8933 54.2311 84.1674 54.2097 84.373 54.0815C84.5787 53.9319 84.67 53.6968 84.6472 53.4616L83.3678 46.3658L88.7139 41.4713C88.8967 41.3003 88.9652 41.0439 88.8738 40.8301H88.8282Z" fill="#EAF2FC"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M32.4424 60.8996H32.4195C29.4951 60.8996 26.7078 59.5531 24.9029 57.2448C23.098 59.5531 20.3336 60.8996 17.3863 60.8996C12.1316 60.8996 7.85925 56.6677 7.85925 51.4527V50.4268C7.85925 48.9948 8.36188 47.6269 9.2986 46.5369L19.7624 34.4183C20.5163 33.542 21.6358 33.0291 22.801 33.0291H51.2681C50.9711 33.884 50.6969 34.7817 50.4684 35.6793H22.801C22.6411 35.6793 22.4812 35.7007 22.3669 35.7648C22.2299 35.8289 22.0928 35.9358 21.9785 36.064L11.5147 48.204C11.2406 48.5032 11.035 48.8665 10.8979 49.2299C10.7608 49.5932 10.6922 49.9993 10.6922 50.4268V51.4313C10.6922 53.3549 11.469 55.0647 12.7028 56.3044C13.9136 57.5013 15.5586 58.228 17.3863 58.228C18.3916 58.228 19.374 57.9929 20.265 57.5654C21.1561 57.1379 21.9557 56.4967 22.5726 55.7059C22.7553 55.4708 22.9609 55.2785 23.2123 55.0861C24.4688 54.2312 26.228 54.4877 27.1419 55.6632C27.7816 56.4754 28.5812 57.1166 29.4951 57.5654C30.3861 57.9929 31.3686 58.228 32.3738 58.228H32.3967C33.4019 58.228 34.3843 57.9929 35.2753 57.5654C36.1664 57.1379 36.966 56.4967 37.6057 55.7059C37.7885 55.4708 37.9941 55.2785 38.2454 55.0861C39.502 54.2312 41.2612 54.4877 42.1751 55.6632C42.8148 56.4754 43.6144 57.1166 44.5283 57.5654C45.4193 57.9929 46.4017 58.228 47.407 58.228H47.4298C48.4351 58.228 49.4175 57.9929 50.3085 57.5654C50.9711 57.2448 51.5879 56.796 52.1134 56.283C52.4332 57.1807 52.7988 58.0784 53.1872 58.9547C51.5422 60.1943 49.5317 60.8782 47.4298 60.8782H47.407C44.4826 60.8782 41.6953 59.5317 39.9132 57.2234C38.1083 59.5317 35.3439 60.8782 32.3967 60.8782L32.4424 60.8996Z" fill="#0EA5E5"/>
<path d="M9.57275 92.0831C8.79596 92.0831 8.15625 91.4847 8.15625 90.758C8.15625 90.0313 8.79596 89.4329 9.57275 89.4329H96.7559C97.5327 89.4329 98.1724 90.0313 98.1724 90.758C98.1724 91.4847 97.5327 92.0831 96.7559 92.0831H9.57275Z" fill="#0EA5E5"/>
<path d="M13.7308 63.1865C13.7308 62.4598 14.3705 61.8613 15.1473 61.8613C15.9241 61.8613 16.5638 62.4598 16.5638 63.1865V90.7578C16.5638 91.4845 15.9241 92.0829 15.1473 92.0829C14.3705 92.0829 13.7308 91.4845 13.7308 90.7578V63.1865ZM89.8105 79.943C89.8105 79.2163 90.4502 78.6179 91.227 78.6179C92.0038 78.6179 92.6435 79.2163 92.6435 79.943V90.7578C92.6435 91.4845 92.0038 92.0829 91.227 92.0829C90.4502 92.0829 89.8105 91.4845 89.8105 90.7578V79.943Z" fill="#0EA5E5"/>
<path d="M23.3951 66.3925C23.3951 65.6658 24.0349 65.0674 24.8116 65.0674C25.5884 65.0674 26.2281 65.6658 26.2281 66.3925V81.4606H67.9006C68.6774 81.4606 69.3171 82.059 69.3171 82.7857C69.3171 83.5124 68.6774 84.1108 67.9006 84.1108H24.8116C24.0349 84.1108 23.3951 83.5124 23.3951 82.7857V66.3925Z" fill="#0EA5E5"/>
<path d="M42.9519 38.3296C43.0661 37.8594 43.5459 37.5602 44.0714 37.6457C44.574 37.7525 44.8938 38.2014 44.8024 38.6929L41.6496 52.7778C41.5354 53.248 41.0556 53.5473 40.5301 53.4618C40.0275 53.3549 39.7076 52.9061 39.799 52.4145L42.9519 38.3296Z" fill="#0EA5E5"/>
<path d="M32.5794 37.8594C32.8079 37.4106 33.3562 37.2396 33.836 37.4533C34.3158 37.667 34.4985 38.18 34.2701 38.6288L27.0962 52.6923C26.8677 53.1412 26.3194 53.3122 25.8396 53.0984C25.3598 52.8847 25.1771 52.3717 25.4055 51.9229L32.5794 37.8594Z" fill="#0EA5E5"/>
<path d="M78.3187 18.0892C71.7388 18.0892 65.7529 20.8464 61.4121 25.3133C57.0483 29.8017 54.3296 36.0213 54.3296 42.9034C54.3296 63.1224 75.3486 81.6743 77.5647 83.6192L77.7475 83.7688C77.8389 83.8543 77.9303 83.8971 78.0217 83.9398C78.113 83.9826 78.2044 83.9826 78.3187 83.9826C78.5243 83.9826 78.7299 83.8971 78.8898 83.7475L79.0726 83.5979C81.2887 81.6529 102.308 63.101 102.308 42.8821C102.308 36.0213 99.6118 29.8017 95.2253 25.292C90.8844 20.825 84.8985 18.0679 78.3187 18.0679V18.0892ZM59.333 23.5394C64.1994 18.5381 70.9163 15.439 78.3187 15.439C85.7438 15.439 92.4608 18.5381 97.3043 23.5394C102.125 28.4979 105.118 35.3587 105.118 42.9034C105.118 64.2552 83.2992 83.5124 80.9917 85.5428L80.8318 85.6711C80.1007 86.3122 79.2097 86.6328 78.2958 86.6328C77.8389 86.6328 77.3591 86.5474 76.925 86.3764C76.5138 86.2054 76.1254 85.9703 75.7827 85.6711L75.6227 85.5428C73.3381 83.5337 51.4966 64.2552 51.4966 42.9034C51.4966 35.3587 54.4895 28.5193 59.3102 23.5394H59.333Z" fill="#0EA5E5"/>
<path d="M90.8386 38.9709C90.7473 38.7358 90.5416 38.5648 90.2675 38.522L82.4311 37.4534C81.997 36.6198 78.9355 30.8491 78.9355 30.785C78.8213 30.5712 78.5699 30.4216 78.2958 30.4216C78.0216 30.4216 77.7703 30.5712 77.6561 30.785C77.6561 30.8491 74.5946 36.6198 74.1605 37.4534L66.3241 38.522C66.0499 38.5648 65.8443 38.7358 65.7529 38.9709C65.6615 39.206 65.7301 39.4624 65.9357 39.6548L71.6017 44.8485L70.2537 52.1581C70.208 52.4146 70.3223 52.6497 70.5279 52.7993C70.7564 52.9489 71.0305 52.9703 71.2818 52.842L78.2729 49.3796L85.264 52.842C85.4925 52.9489 85.7895 52.9275 86.018 52.7993C86.2236 52.6497 86.3378 52.3932 86.2921 52.1581L84.9442 44.8485L90.6102 39.6548C90.793 39.4838 90.8615 39.206 90.793 38.9709H90.8386ZM93.5117 38.1587C93.923 39.3556 93.5803 40.6593 92.6207 41.5356L88.0057 45.7461L89.1023 51.6879C89.3308 52.9275 88.7824 54.1672 87.6858 54.9152C86.5892 55.6419 85.1498 55.7488 83.9618 55.1717L78.2729 52.3718L72.5841 55.1717C71.3961 55.7488 69.9567 55.6633 68.8601 54.9152C67.7634 54.1672 67.238 52.9275 67.4436 51.6879L68.5402 45.7461L63.9252 41.5356C62.9656 40.6593 62.6229 39.3556 63.0342 38.1587C63.4454 36.9618 64.5649 36.0855 65.89 35.9145L72.2414 35.0382L75.0972 29.6308C75.6913 28.498 76.9021 27.7927 78.2501 27.7927C79.5981 27.7927 80.8089 28.5194 81.4029 29.6308L84.2588 35.0382L90.6102 35.9145C91.9353 36.0855 93.0548 36.9618 93.466 38.1587H93.5117Z" fill="#0EA5E5"/>
<path d="M78.3187 85.03C82.4768 85.03 85.8581 88.1932 85.8581 92.0832H70.8021C70.8021 88.1932 74.1834 85.03 78.3416 85.03H78.3187Z" fill="#0EA5E5"/>
</svg>
                </div>
            </div>
            
                <div class="full__order__left__address">
                    <input type="text" class="address__input" placeholder="Адрес">
                    <input type="text" class="house__number__input" placeholder="Квартира">
                </div>
                <div class="full__order__left__map">
                    <!-- iframe? -->
                </div>
            
    </div>
    <div class="chosen__method__shipping">
        <div class="full__order__left__shipping">
            <div class="full__order__left__shipping__choose">
                <div class="full__order__left__shipping__choose__item__wrapper">
                    <div id="shipping__today" class="full__order__left__shipping__choose__item shipping__choose__item__active ">
                        <p class="full__order__left__shipping__choose__item__title">Сегодня</p>
                        <p class="full__order__left__shipping__choose__item__description">Выбрать время</p>
                    </div>
                    <div id="shipping__other__day" class="full__order__left__shipping__choose__item">
                        <p class="full__order__left__shipping__choose__item__title">Другой день</p>
                        <p class="full__order__left__shipping__choose__item__description">Выбрать дату и время</p>
                    </div>
                </div>
                <div class="full__order__left__shipping__choose__price__wrapper">
                    <p>Стоимость доставки:</p>
                    <p class="full__order__left_shipping_choose_price">от 300 рублей</p>
                </div>
            </div>
            <div class="full__order__left__shipping__time__choose__wrapper">
                <div class="shipping__today">
                    <h2>Время доставки</h2>
                    <div class="swiper">
                        <div class="full__order__left__shipping__time__choose__item__wrapper swiper-wrapper">
                            <div class="full__order__left__shipping__time__choose__item choose__item__active swiper-slide">
                                <p class="full__order__left__shipping__time__choose__item__title">Быстрее</p>
                                <p class="full__order__left__shipping__time__choose__item__description">От 45 мин.</p>
                            </div>
                            <div class="full__order__left__shipping__time__choose__item swiper-slide">
                                <p class="full__order__left__shipping__time__choose__item__description">c 10 до 13 часов</p>
                            </div>
                            <div class="full__order__left__shipping__time__choose__item swiper-slide">
                                <p class="full__order__left__shipping__time__choose__item__description">c 12 до 15 часов</p>
                            </div>
                            <div class="full__order__left__shipping__time__choose__item swiper-slide">
                                <p class="full__order__left__shipping__time__choose__item__description">c 14 до 17 часов</p>
                            </div>
                            <div class="full__order__left__shipping__time__choose__item swiper-slide">
                                <p class="full__order__left__shipping__time__choose__item__description">c 16 до 20 часов</p>
                            </div>
                            <div class="full__order__left__shipping__time__choose__item swiper-slide">
                                <p class="full__order__left__shipping__time__choose__item__description">c 19 до 22 часов</p>
                            </div>
                            <div class="full__order__left__shipping__time__choose__item swiper-slide">
                                <p class="full__order__left__shipping__time__choose__item__description">c 21 до 24 часов</p>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
                <div class="shipping__other__day">
                    <div class="shipping__other__day__wrapper">
                        <div class="shipping__other__day__item">
                            <label for="">Дата доставки</label>
                            <input type="text" placeholder="Укажите дату">
                        </div>
                        <div class="shipping__other__day__item">
                            <label for="">Время</label>
                            <input type="text" placeholder="Выберите интервал">
                        </div>
                    </div>
                </div>
                <div class="full__order__left__shipping__not__found__wrapper">
                    <p class="full__order__left__shipping_not__found__title">Не нашёл подходящий интервал</p>
                    <input type="text" class="time__input" placeholder="Укажите удобное время">
                </div>
                <div class="full__order__left__shipping__client__info__wrapper">
                    <p class="full__order__left__shipping__client__info__description">Стоимость доставки рассчитывает  менеджер при подтверждении заказа по телефону<br>
                        ВАЖНО подтверждение и изготовление срочных заказов Происходит в графике работы мастерской, ежедневно с 9:00 до 22:00</p>
                    <div class="full__order__left__shipping__client__info__item__wrapper">
                        <div class="full__order__left__shipping__client__info__item">
                            <label for="">Ваше Имя</label>
                            <input type="text" placeholder="Укажите имя">
                        </div>
                        <div class="full__order__left__shipping__client__info__item">
                            <label for="">Ваш телефон</label>
                            <input type="phone" placeholder="+7 (999)999-99-99">
                        </div>
                        <div class="full__order__left__shipping__client__info__item">
                            <label for="">Ваш e-mail</label>
                            <input type="email" placeholder="Укажиту почту">
                        </div>
                    </div>
                </div>
                <div class="full__order__left__shipping__client__add__wrapper">
                    <p class="full__order__left__shipping__client__add__title">Добавить контакт получателя</p>
                    <div class="full__order__left__shipping__client__info__item__wrapper">
                        <div class="full__order__left__shipping__client__info__item">
                            <label for="">Имя получателя</label>
                            <input type="text" placeholder="Укажите имя">
                        </div>
                        <div class="full__order__left__shipping__client__info__item">
                            <label for="">Телефон получателя</label>
                            <input type="phone" placeholder="+7 (999)999-99-99">
                        </div>
                        <div class="full__order__left__shipping__client__add__item">
                            <input name="cssCheckbox" type="checkbox" class="css-checkbox">
                            <p>Получатель не в курсе что едет. Это сюрприз</p>
                        </div>
                    </div>
                    <div class="full__order__left__shipping__client__info__item">
                        <label for="">Комментарий</label>
                        <input class="comment__input" type="textarea" placeholder="Здесь вы можете указать все ваши пожелания по заказу, особые требования к нему, если имеются">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="chosen__method__pickup">
        <div class="full__order__left__pickup__map">
            <!-- iframe? -->
        </div>
        <div class="full__order__left__pickup__address">
            <p>Адрес офиса: Указать адрес</p>
            <p>Внимание! Заказ можно забирать только после подтверждения оператором!</p>
        </div>
        <div class="full__order__left__shipping__client__info__item__wrapper">
            <div class="full__order__left__shipping__client__info__item">
                <label for="">Ваше Имя</label>
                <input type="text" placeholder="Укажите имя">
            </div>
            <div class="full__order__left__shipping__client__info__item">
                <label for="">Ваш телефон</label>
                <input type="phone" placeholder="+7 (999)999-99-99">
            </div>
            <div class="full__order__left__shipping__client__info__item">
                <label for="">Ваш e-mail</label>
                <input type="email" placeholder="Укажиту почту">
            </div>
        </div>
        <div class="full__order__left__shipping__client__info__item__wrapper pickup__client__comment">
            <div class="full__order__left__shipping__client__info__item">
                <label for="">Комментарий</label>
                <input class="comment__input" type="textarea" placeholder="Здесь вы можете указать все ваши пожелания по заказу, особые требования к нему, если имеются">
            </div>
            <div class="full__order__left__pickup__client__info__item__wrapper">
                <label for="">Дата самовывоза</label>
                <input type="text" placeholder="03.07.2024">
                <div class="full__order__left__shipping__client__add__item">
                    <input name="cssCheckbox" type="checkbox" class="css-checkbox">
                    <p>Согласие на обработку персональных данных</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="full__order__right">
        <!-- Content for the right side -->
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.full__order__left__shipping__choose__item').on('click', function() {
            $('.full__order__left__shipping__choose__item').removeClass('shipping__choose__item__active');
            $(this).addClass('shipping__choose__item__active');

            if ($(this).attr('id') === 'shipping__today') {
                $('.shipping__today').show();
                $('.shipping__other__day').hide();
            } else if ($(this).attr('id') === 'shipping__other__day') {
                $('.shipping__today').hide();
                $('.shipping__other__day').show();
            }
        });


        $('#shipping__today').addClass('shipping__choose__item__active');
        $('.shipping__today').show();

        $('.full__order__left__shipping__time__choose__item').on('click', function() {
            $('.full__order__left__shipping__time__choose__item').removeClass('choose__item__active');
            $(this).addClass('choose__item__active');
        });

        $('.full__order__left__shipping__time__choose__item').first().addClass('choose__item__active');

        $('.full__order__left__method__item').on('click', function() {
                $('.full__order__left__method__item').removeClass('left__method__active');
                $(this).addClass('left__method__active');

                if ($(this).attr('id') === 'chosen__method__shipping') {
                    $('.chosen__method__shipping').css('display', 'flex');
                    $('.chosen__method__pickup').css('display', 'none');
                    $('.full__order__left__address').css('display', 'flex');
                } else if ($(this).attr('id') === 'chosen__method__pickup') {
                    $('.chosen__method__shipping').css('display', 'none');
                    $('.chosen__method__pickup').css('display', 'flex');
                    $('.full__order__left__address').css('display', 'none');
                }
            });
        $('#chosen__method__shipping').addClass('left__method__active');
        $('.chosen__method__shipping').css('display', 'flex');
        $('.full__order__left__address').css('display', 'flex');

        $('.full__order__left__shipping_not__found__title').on('click', function() {
            $('.time__input').toggle();
        });
    });
</script>
<script>
const swiper = new Swiper('.swiper', {
  // Optional parameters
  loop: true,
slidesPerView:6,
  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
</script>
<style>
    .pickup__client__comment .comment__input{
        width: 742px !important;
    }
    .full__order__left__pickup__client__info__item__wrapper{
        display: flex;
        flex-direction: column;
        gap: 34px;
    }
    .chosen__method__shipping{
        display: flex;
        flex-direction: column;
        gap: 34px;
    }
    .chosen__method__pickup{
        display: flex;
        flex-direction: column;
        gap: 34px;
    }
    .shipping__other__day__wrapper{
        display: flex;
        flex-direction: row;
        gap: 34px;
    }
    .shipping__other__day__item{
        display: flex;
        flex-direction: column;
        width: 50%;
    }
    .shipping__other__day__wrapper label{
        margin-bottom: 34px;
    }
    .shipping__today, .shipping__other__day, .chosen__method__shipping, .chosen__method__pickup {
            display: none;
        }
        .time__input {
            display: none;
        }
    .swiper{
        margin: 0;
        width:100%;
    }
    .full__order__wrapper{
        display: flex;
    }
    .full__order__left{
        display: flex;
        flex-direction: column;
    border-radius: 3px;
    width: 75%;
    gap: 34px;
    padding: 34px;
    }
    .full__order__left__border{
        border-color: var(--stroke_black);
        display: flex;
        flex-direction: column;
        border: 1px solid var(--stroke_black);
    border-radius: 3px;
    gap: 34px;
    padding: 34px;
    }
    .full__order__left__method{
        display: flex;
        flex-direction: row;
        gap: 34px;
    }
    .left__method__active{
        border: 1px solid var(--fill_dark_light_hover) !important;
        background: #2196e23b;  
    }
    .left__method__active h2{
        color: var(--fill_dark_light_hover);
    }
    .full__order__left__method__item h2{
        font-weight: 500;
font-size: 20px;
margin: 0 !important;
line-height: 120%;
color: var(--white_text_black);
    }
    .full__order__left__method__item{

    border-radius: 15px;
    width: 50%;
    height: 145px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    border: 1px solid var(--stroke_black);
    }
    .full__order__left input{
        border: 1px solid var(--fill_dark_light_hover);
border-radius: 15px;
height: 43px;
padding-left: 31px;
    }
    .full__order__left__address{
        display: flex;
        flex-direction: row;
        gap: 34px;
    }
    .address__input{
        width: 75%;
    }
    .house__number__input{
        width: 25%;
    }
    .full__order__left__shipping__choose{
        display: flex;
        flex-direction: row;
    }
    .full__order__left__shipping__choose__item__wrapper{
        width: 82%;
        gap: 34px;
        display: flex;
    flex-direction: row;
    }
.shipping__choose__item__active{
    border: 1px solid var(--fill_dark_light_hover);
    background: var(--fill_dark_light_hover);
}
    .full__order__left__shipping__choose__item{
        border: 1px solid var(--stroke_black);
border-radius: 15px;
width: 261px;
height: 75px;
padding: 11px 31px;
background: #67676738;
    }
    .full__order__left__shipping__choose__item p{
        font-weight:600;
    }
    .full__order__left_shipping_choose_price{
        font-weight: 600;
font-size: 24px;
line-height: 125%;
text-align: right;
color: var(--fill_dark_light_hover);
    }
  .full__order__left__shipping__time__choose__wrapper{
    display: flex;
    flex-direction: column;
    gap: 34px;
  }
  .full__order__left__shipping__time__choose__item__wrapper{
    display: flex;
    flex-direction: row;
    gap: 34px;
  }
  .full__order__left__shipping__time__choose__item__wrapper .choose__item__active{
    border: 1px solid var(--fill_dark_light_hover);
    background: var(--fill_dark_light_hover);
  }
  .full__order__left__shipping__time__choose__item{
    border-color:var(--stroke_black);   
border-radius: 15px;
width: 168px !important;
height: 75px;
display: flex;
padding: 16px;
align-items: center;
background: #67676738;
display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
  }
  .full__order__left__shipping_not__found__title{
font-weight: 600;
font-size: 20px;
line-height: 123%;
text-decoration: underline;
text-decoration-skip-ink: none;
color: var(--fill_dark_light_hover);
  }
  .time__input{
    width: 75%;
  }
  .full__order__left label{
    font-weight: 600;
font-size: 20px;
line-height: 123%;
color: var(--white_text_black);
  }
  .full__order__left__shipping__client__info__item__wrapper{
    display: flex;
    flex-direction: row;
    gap:34px;
    align-items: flex-end;
  }
  .full__order__left__shipping__client__info__item{
    display: flex;
    flex-direction: column;
    gap: 34px;
  }
  .shipping__choose__item__active {
    color: var(--white_text_black);
    border: 1px solid var(--fill_dark_light_hover);
    background: var(--fill_dark_light_hover);
  }
  .full__order__left p{
    margin: 0 !important;
  }
  .full__order__left__shipping__client__add__item{
    display: flex;
    flex-direction: row;
    align-items: flex-end;
    gap: 34px;
  }
  .full__order__left__shipping__time__choose__item__description{
    font-weight: 600;
font-size: 16px;
line-height: 154%;
color: var(--white_text_black);
  }
  .full__order__left__shipping__not__found__wrapper{
    gap: 34px;
    display: flex;
    flex-direction: column;
  }
  .full__order__left__shipping{
    display: flex;
    flex-direction: column;
    gap: 34px;
  }
  .full__order__left__shipping__client__info__wrapper{
    display: flex;
    flex-direction: column;
    gap: 34px;
  }
  .comment__input{
    height: 155px !important;
  }
  .full__order__left__shipping__client__add__wrapper{
    display: flex;
    flex-direction: column;
    gap: 34px;
  }
  input[type="checkbox"] {
  appearance: none;
  -webkit-appearance: none;
  display: flex;
  align-content: center;
  justify-content: center;
padding-left: 0 !important;
}
input[type="checkbox"]::before {
  content: "";
  width:32px;
  height: 32px;
  clip-path: polygon(20% 0%, 0% 20%, 30% 50%, 0% 80%, 20% 100%, 50% 70%, 80% 100%, 100% 80%, 70% 50%, 100% 20%, 80% 0%, 50% 30%);
  transform: scale(0);
  background-color:#82CF00;
}
input[type="checkbox"]:checked::before {
  transform: scale(1);
}

.full__order__left__shipping__client__info__item__wrapper input{
    width: 354px;
}
.full__order__left__shipping__client__add__item input{
width: 85px;
}
.full__order__left__shipping__choose__price__wrapper{
    display: flex;
    flex-direction: column;
    gap: 21px;
}
.full__order__left__shipping__choose__price__wrapper p{
    text-align: right;
}
    </style>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>