<?php 
use LSYS\PayGateway\Pay\PayResult\SuccResult;
use LSYS\PayGateway\Pay\PayResult\FailResult;
use LSYS\PayGateway\Adapter\Qpay\PayWapMgr;
include __DIR__."/../Bootstarp.php";
include_once './qqPay.Config.php';
$config=(new \ReflectionClass('\QQPayConfig'))->getConstants();
$pay=(new PayWapMgr(QPAYWAP))->pay_create($config);
$result=$pay->pay_callback();
if ($result instanceof SuccResult){
    pay_callback($pay,$result);
    echo "支付成功";
}elseif ($result instanceof FailResult){
    $result->get_msg();
}