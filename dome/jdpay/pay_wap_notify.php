<?php
use LSYS\PayGateway\Adapter\JD\PayWapMgr;
include __DIR__."/../Bootstarp.php";
$config=include_once 'cfg.php';
$pay=(new PayWapMgr(JDWAP))->pay_create($config);
pay_notify($pay,$pay->pay_notify()); 