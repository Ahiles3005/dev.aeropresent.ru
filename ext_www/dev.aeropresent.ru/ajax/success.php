<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
?>


<a href="#" class="close jqmClose"><?= CMax::showIconSvg('', SITE_TEMPLATE_PATH . '/images/svg/Close.svg') ?></a>
<div class="form">
    <div class="form_head" style="text-align: center;padding-bottom: 30px;">
        <h2>Заявка принята</h2>
    </div>
</div>


<script>
    $('.jqmClose').on('click', function(e){
        e.preventDefault();
        $(this).closest('.jqmWindow').jqmHide();
    })
</script>