<?php
use LSYS\PayGateway\Adapter\Upacp\ApplePayMgr;
include __DIR__."/../Bootstarp.php";
$_config=include_once './cfg.php';
$pay=(new ApplePayMgr(UINONPAYAPPLE))->pay_create($_config);
pay_notify($pay,$pay->pay_notify()); 