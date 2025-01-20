<?php
$arUrlRewrite=array (
  58 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 10,
  ),
  0 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/([\\w\\d\\-]+)?(/)?(([\\w\\d\\-]+)(/)?)?#',
    'RULE' => 'REQUEST_OBJECT=$1&METHOD=$4',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  75 => 
  array (
    'CONDITION' => '#^/pub/calendar-sharing/([0-9a-zA-Z]+)/?([^/]*)#',
    'RULE' => 'hash=$1',
    'ID' => 'bitrix:calendar.pub.sharing',
    'PATH' => '/pub/calendar_sharing.php',
    'SORT' => 100,
  ),
  72 => 
  array (
    'CONDITION' => '#^/timeman/login-history/([0-9]+)/.*#',
    'RULE' => 'user=$1',
    'ID' => 'bitrix:intranet.user.login.history',
    'PATH' => '/timeman/login-history/index.php',
    'SORT' => 100,
  ),
  80 => 
  array (
    'CONDITION' => '#^/pub/payment-slip/([\\w\\W]+)/#',
    'RULE' => 'signed_payment_id=$1',
    'ID' => 'bitrix:salescenter.pub.payment.slip',
    'PATH' => '/pub/payment_slip.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/personal/history-of-orders/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.order',
    'PATH' => '/personal/history-of-orders/index.php',
    'SORT' => 100,
  ),
  86 => 
  array (
    'CONDITION' => '#^/sign/link/member/([0-9]+)/#',
    'RULE' => 'memberId=$1',
    'ID' => '',
    'PATH' => '/sign/link.php',
    'SORT' => 100,
  ),
  74 => 
  array (
    'CONDITION' => '#^/marketing/master-yandex/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/master-yandex.php',
    'SORT' => 100,
  ),
  69 => 
  array (
    'CONDITION' => '#^/shop/documents-catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.catalog.controller',
    'PATH' => '/shop/documents-catalog/index.php',
    'SORT' => 100,
  ),
  71 => 
  array (
    'CONDITION' => '#^/shop/documents-stores/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.store.entity.controller',
    'PATH' => '/shop/documents-stores/index.php',
    'SORT' => 100,
  ),
  33 => 
  array (
    'CONDITION' => '#^/skwb_courier/check/#',
    'RULE' => '',
    'ID' => 'skyweb24:itinerarycourier_user',
    'PATH' => '/skwb_courier/check/index.php',
    'SORT' => 100,
  ),
  17 => 
  array (
    'CONDITION' => '#^/company/partners/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/partners/index.php',
    'SORT' => 100,
  ),
  18 => 
  array (
    'CONDITION' => '#^/company/licenses/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/licenses/index.php',
    'SORT' => 100,
  ),
  26 => 
  array (
    'CONDITION' => '#^/personal/loyalty/#',
    'RULE' => '',
    'ID' => 'skyweb24:loyaltyprogram',
    'PATH' => '/personal/loyalty/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/contacts/stores/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.store',
    'PATH' => '/contacts/stores/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/company/vacancy/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/vacancy/index.php',
    'SORT' => 100,
  ),
  19 => 
  array (
    'CONDITION' => '#^/company/reviews/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/reviews/index.php',
    'SORT' => 100,
  ),
  68 => 
  array (
    'CONDITION' => '#^/shop/documents/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.store.document',
    'PATH' => '/shop/documents/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/personal/order/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.order',
    'PATH' => '/personal/order/index.php',
    'SORT' => 100,
  ),
  82 => 
  array (
    'CONDITION' => '#^/agent_contract/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.agent.contract.controller',
    'PATH' => '/agent_contract/index.php',
    'SORT' => 100,
  ),
  78 => 
  array (
    'CONDITION' => '#^/shop/terminal/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.terminal.payment.controller',
    'PATH' => '/terminal/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/company/staff/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/staff/index.php',
    'SORT' => 100,
  ),
  32 => 
  array (
    'CONDITION' => '#^/courier/check/#',
    'RULE' => '',
    'ID' => 'skyweb24:itinerarycourier_user',
    'PATH' => '/courier/check/index.php',
    'SORT' => 100,
  ),
  95 => 
  array (
    'CONDITION' => '#^/calendar/open/#',
    'RULE' => '',
    'ID' => 'bitrix:calendar.open-events',
    'PATH' => '/calendar/open_events.php',
    'SORT' => 100,
  ),
  73 => 
  array (
    'CONDITION' => '#^/shop/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.productcard.controller',
    'PATH' => '/shop/catalog/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/company/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/news/index.php',
    'SORT' => 100,
  ),
  20 => 
  array (
    'CONDITION' => '#^/company/docs/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/docs/index.php',
    'SORT' => 100,
  ),
  64 => 
  array (
    'CONDITION' => '#^/vopros-otvet/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/vopros-otvet/index.php',
    'SORT' => 100,
  ),
  79 => 
  array (
    'CONDITION' => '#^/crm/terminal/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.terminal.payment.controller',
    'PATH' => '/terminal/index.php',
    'SORT' => 100,
  ),
  85 => 
  array (
    'CONDITION' => '#^/bi/dashboard/#',
    'RULE' => '',
    'ID' => 'bitrix:biconnector.apachesuperset.dashboard.controller',
    'PATH' => '/bi/dashboard/index.php',
    'SORT' => 100,
  ),
  15 => 
  array (
    'CONDITION' => '#^/sharebasket/#',
    'RULE' => '',
    'ID' => 'aspro:basket.share.max',
    'PATH' => '/sharebasket/index.php',
    'SORT' => 100,
  ),
  81 => 
  array (
    'CONDITION' => '#^/collections/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/collections/index.php',
    'SORT' => 100,
  ),
  70 => 
  array (
    'CONDITION' => '#^/crm/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.catalog.controller',
    'PATH' => '/crm/catalog/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/info/brands/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/brands/index.php',
    'SORT' => 100,
  ),
  96 => 
  array (
    'CONDITION' => '#^/desktop/menu#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/desktop_menu/index.php',
    'SORT' => 100,
  ),
  16 => 
  array (
    'CONDITION' => '#^/lookbooks/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/lookbooks/index.php',
    'SORT' => 100,
  ),
  77 => 
  array (
    'CONDITION' => '#^/terminal/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.terminal.payment.controller',
    'PATH' => '/terminal/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/projects/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/projects/index.php',
    'SORT' => 100,
  ),
  13 => 
  array (
    'CONDITION' => '#^/landings/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/landings/index.php',
    'SORT' => 100,
  ),
  48 => 
  array (
    'CONDITION' => '#^/personal/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.section',
    'PATH' => '/personal/index.php',
    'SORT' => 100,
  ),
  22 => 
  array (
    'CONDITION' => '#^/loyalty/#',
    'RULE' => NULL,
    'ID' => 'skyweb24:loyaltyprogram',
    'PATH' => '/loyalty/index.php',
    'SORT' => 100,
  ),
  76 => 
  array (
    'CONDITION' => '#^/market/#',
    'RULE' => '',
    'ID' => 'bitrix:market',
    'PATH' => '/market/index.php',
    'SORT' => 100,
  ),
  84 => 
  array (
    'CONDITION' => '#^/spaces/#',
    'RULE' => '',
    'ID' => 'bitrix:socialnetwork.spaces',
    'PATH' => '/spaces/index.php',
    'SORT' => 100,
  ),
  90 => 
  array (
    'CONDITION' => '#^/otzyvy/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/otzyvy/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/auth/#',
    'RULE' => '',
    'ID' => 'aspro:auth.max',
    'PATH' => '/auth/index.php',
    'SORT' => 100,
  ),
  35 => 
  array (
    'CONDITION' => '#^/sale/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/sale/index.php',
    'SORT' => 100,
  ),
  83 => 
  array (
    'CONDITION' => '#^/sign/#',
    'RULE' => '',
    'ID' => 'bitrix:sign.start',
    'PATH' => '/sign/index.php',
    'SORT' => 100,
  ),
  99 => 
  array (
    'CONDITION' => '#^/blog/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/blog/index.php',
    'SORT' => 100,
  ),
  100 => 
  array (
    'CONDITION' => '#^/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
);
