<?php
use LSYS\PayGateway\Adapter\Upacp\PayMgr;
include __DIR__."/../Bootstarp.php";
$_config=include_once './cfg.php';
$pay=(new PayMgr(UINONPAY))->pay_create($_config);
pay_notify($pay,$pay->pay_notify()); 