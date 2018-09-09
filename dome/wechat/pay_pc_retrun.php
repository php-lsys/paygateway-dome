<?php 
use LSYS\PayGateway\Pay\PayResult\SuccResult;
use LSYS\PayGateway\Pay\PayResult\FailResult;
use LSYS\PayGateway\Adapter\Wechat\PayCodeMgr;
include __DIR__."/../Bootstarp.php";
include_once './WxPay.Config.php';
$config=\LSYS\PayGateway\Adapter\Wechat\PayWapConfig::WxPayConfig_to_arr();
$pay=(new PayCodeMgr(WEIXINWEB))->pay_create($config);
$result=$pay->pay_callback();
if ($result instanceof SuccResult){
    pay_callback($pay,$result);
    echo "支付成功";
}elseif ($result instanceof FailResult){
    $result->get_msg();
}