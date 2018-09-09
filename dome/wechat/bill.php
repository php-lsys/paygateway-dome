<?php
use LSYS\PayGateway\Adapter\Wechat\Bill;
include __DIR__."/../Bootstarp.php";
include_once './WxPay.Config.php';
$config=\LSYS\PayGateway\Adapter\Wechat\PayCodeConfig::arr(\LSYS\PayGateway\Adapter\Wechat\PayWapConfig::WxPayConfig_to_arr());
$bill= new Bill($config);
$bill->set_date("2017-1-9")->exec();
while ($result=$bill->get_result()){
	bill_callback($bill,$result);
}