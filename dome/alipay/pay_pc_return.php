<?php
use LSYS\PayGateway\Adapter\Alipay\PayWebMgr;
include __DIR__."/../Bootstarp.php";
include_once 'alipay.config.php';
$pay=(new PayWebMgr(ALIPAYPC))->pay_create($alipay_config);
pay_callback($pay,$pay->pay_callback());