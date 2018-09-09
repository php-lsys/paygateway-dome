<?php
use LSYS\PayGateway\Adapter\Alipay\PayWapMgr;
use LSYS\PayGateway\Adapter\Alipay\PayWebMgr;
use LSYS\PayGateway\Adapter\Alipay\PayAppMgr;
include __DIR__."/../Bootstarp.php";
include_once 'alipay.config.php';
$type=ALIPAYWAP;
switch ($type){
    case ALIPAYWAP:
        $refund=(new PayWapMgr($type))->refund_create($alipay_config);
    break;
    case ALIPAYPC:
        $refund=(new PayWebMgr($type))->refund_create($alipay_config);
    break;
    case ALIPAYAPP:
        $refund=(new PayAppMgr($type))->refund_create($alipay_config);
    break;
    default:die('bad');
}
refund_callback($refund,$refund->refund_notify());
