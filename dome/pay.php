<?php
use LSYS\PayGateway\Pay\PayParam;
use LSYS\PayGateway\Pay\PayAdapterMore;

require_once  __DIR__."/Bootstarp.php";
require_once  __DIR__."/pay_public.php";
/*
 * 执行支付
 */

$name=@$_GET['name'];
$order_no=isset($_GET['order_no'])?$_GET['order_no']:LSYS\PayGateway\Utils::snno_create('MY');
$amount=isset($_GET['amount'])?$_GET['amount']:1;
$mgr=LSYS\PayGateway\DI::get()->paygateway_paymgr();
/**
 * @var \LSYS\PayGateway\PayMgr $mgr
 */

$pay_param = new PayParam($amount,$order_no);
$pay=$mgr->find($name);
if (!$pay){
	die('支付方式错误');
}
$pay=$pay->pay_create($config[$name]['pay_config']);
if ($pay instanceof PayAdapterMore){
    $key=isset($_GET['key'])?$_GET['key']:'boc';
    $res=$pay->pay_render($key,$pay_param);
}else {
    $res=$pay->pay_render($pay_param);
}
echo $res;

//自定义前端JS处理...
$type=$res->get_out();
include_once 'js.php';

