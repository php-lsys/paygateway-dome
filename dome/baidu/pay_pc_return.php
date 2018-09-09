<?php
use LSYS\PayGateway\Adapter\Baidu\PayWebMgr;
include __DIR__."/../Bootstarp.php";
$config=include_once 'cfg.php';
$pay=(new PayWebMgr(BAIDUWEB))->pay_create($config);
pay_callback($pay,$pay->pay_callback());