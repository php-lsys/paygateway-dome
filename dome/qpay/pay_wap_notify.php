<?php
use LSYS\PayGateway\Adapter\Qpay\PayWapMgr;
include __DIR__."/../Bootstarp.php";
include_once './qqPay.Config.php';
$config=(new \ReflectionClass('\QQPayConfig'))->getConstants();
$pay=(new PayWapMgr(QPAYWAP))->payCreate($config);
pay_notify($pay,$pay->payNotify()); 