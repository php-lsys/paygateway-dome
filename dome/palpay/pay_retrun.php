<?php
use LSYS\PayGateway\Adapter\Palpay\PayMgr;
include __DIR__."/../Bootstarp.php";
$_config=include_once './cfg.php';
$pay=(new PayMgr(PALPAY))->pay_create($_config);
pay_callback($pay,$pay->pay_callback());