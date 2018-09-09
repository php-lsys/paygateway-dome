<?php
use LSYS\PayGateway\Adapter\Alipay\TransfersMgr;
include __DIR__."/../Bootstarp.php";
include_once 'alipay.config.php';
$transfers=(new TransfersMgr("alipay"))->transfers_create($alipay_config);
transfers_callback($transfers,$transfers->transfers_notify());