<?php
use LSYS\PayGateway\Adapter\Palpay\DirectPayMgr;
include __DIR__."/../Bootstarp.php";
$_config=include_once './cfg.php';
$pay=(new DirectPayMgr(PALPAYDIRECT))->pay_create($_config);
$pay->direct_pay_from_post();