<?php
use LSYS\PayGateway\Adapter\Wechat\PayCodeMgr;
include __DIR__."/../Bootstarp.php";
include_once './WxPay.Config.php';
$config=\LSYS\PayGateway\Adapter\Wechat\PayWapConfig::WxPayConfig_to_arr();
$pay=(new PayCodeMgr(WEIXINWEB))->pay_create($config);
pay_notify($pay,$pay->pay_notify()); 