<?php
use LSYS\PayGateway\Utils;
use LSYS\PayGateway\Transfers\TransfersAdapter\RealTime;
use LSYS\PayGateway\Transfers\TransfersAdapter\Batch;
use LSYS\PayGateway\Transfers\TransfersResult\SuccResult;
use LSYS\PayGateway\Transfers\TransfersResult\IngResult;

require_once  __DIR__."/Bootstarp.php";
require_once  __DIR__."/transfers_public.php";

/**
 * @var \LSYS\PayGateway\TransfersMgr $mgr
 */
$mgr=LSYS\PayGateway\DI::get()->paygateway_transfersmgr();
$name=@$_GET['name'];
$pay_utils = $mgr->find($name);
if (!$pay_utils){
    die('不支持退款');
}
$pay_utils = $pay_utils ->transfers_create($config[$name]['config']);

function create_param(){
	$account='654654654654';//提款账号 支付宝账号 或微信openid 或其他...
	$name='lon';//提款姓名
	$total='1';//提款金额
	$pay_sn=Utils::snno_create('t');//提款号
	$extra=array();//其他附带参数
	$msg='提款备注';//
	$param= new \LSYS\PayGateway\Transfers\TransfersParam($account, $name, $total,$pay_sn);
	$param->set_extra($extra)->set_pay_msg($msg);
	return $param;
}

if ($pay_utils instanceof RealTime){//支持即时到账,微信支付方式
	$result=$pay_utils->real_transfers(create_param());
	if ($result instanceof SuccResult){
		echo "提款成功";
	}else if ($result instanceof IngResult){
		echo "提款请求中";
	}else{
		echo "提款失败:".$result->get_msg();
	}
}else if ($pay_utils instanceof Batch){//批量付款  支付宝支付方式
	//add more...
	$pay_utils->add(create_param());
	//渲染付款页面
	echo $pay_utils->render();
}