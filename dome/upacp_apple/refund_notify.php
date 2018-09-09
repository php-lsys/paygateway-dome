<?php
use LSYS\PayGateway\Adapter\Upacp\ApplePayMgr;
include __DIR__."/../Bootstarp.php";
$config=include_once 'cfg.php';
$refund=(new ApplePayMgr(UINONPAYAPPLE))->refund_create($config);
refund_callback($refund,$refund->refund_notify());