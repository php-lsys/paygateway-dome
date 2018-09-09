<?php
use LSYS\PayGateway\Adapter\Qpay\PayWapMgr;
include __DIR__."/../Bootstarp.php";
include_once './qqPay.Config.php';
$config=(new \ReflectionClass('\QQPayConfig'))->getConstants();
$pay=(new PayWapMgr(QPAYWAP))->pay_create($config);
pay_notify($pay,$pay->pay_notify()); 