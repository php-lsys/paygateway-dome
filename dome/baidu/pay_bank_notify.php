<?php
use LSYS\PayGateway\Adapter\Baidu\PayBankMgr;
include __DIR__."/../Bootstarp.php";
$config=include_once 'cfg.php';
$pay=(new PayBankMgr(BAIDUBANK))->pay_create($config);
pay_notify($pay,$pay->pay_notify()); 