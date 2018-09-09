<?php
use LSYS\PayGateway\Adapter\Wechat\PayWapMgr;
include __DIR__."/../Bootstarp.php";
include_once './WxPay.Config.php';
$config=\LSYS\PayGateway\Adapter\Wechat\PayWapConfig::WxPayConfig_to_arr();
$pay=(new PayWapMgr(WEIXINWAP))->pay_create($config);

pay_notify($pay,$pay->pay_notify()); 