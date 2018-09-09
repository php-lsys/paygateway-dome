<?php
use LSYS\PayGateway\Adapter\Baidu\PayWapMgr;
use LSYS\PayGateway\Adapter\Baidu\PayWebMgr;
use LSYS\PayGateway\Adapter\Baidu\PayBankMgr;
include __DIR__."/../Bootstarp.php";
$config=include_once 'cfg.php';
$type=BAIDUWAP;
switch ($type){
    case BAIDUBANK:
        $refund=(new PayBankMgr($type))->refund_create($config);
        break;
    case BAIDUWAP:
        $refund=(new PayWebMgr($type))->refund_create($config);
        break;
    case BAIDUWEB:
        $refund=(new PayWapMgr($type))->refund_create($config);
        break;
    default:die('bad');
}
refund_callback($refund,$refund->refund_notify());