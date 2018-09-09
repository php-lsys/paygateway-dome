<?php
use LSYS\PayGateway\Adapter\Alipay\PayWebMgr;
include __DIR__."/../Bootstarp.php";
include_once 'alipay.config.php';
$pay=(new PayWebMgr(ALIPAYPC))->pay_create($alipay_config);
pay_notify($pay,$pay->pay_notify());
$pay->pay_notify_output(true);