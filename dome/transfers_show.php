<?php

require_once  __DIR__."/Bootstarp.php";
require_once  __DIR__."/transfers_public.php";

/**
 * @var \LSYS\PayGateway\TransfersMgr $mgr
 */
$mgr=LSYS\PayGateway\DI::get()->paygateway_transfersmgr();
function to_pay($name){
	echo "<a href='./transfers.php?name={$name}&amount=1'>提现1元</a>";
}

foreach ($mgr->find_all() as $v){
	echo "支付类型:";
	echo $v->get_name();
	to_pay($v->get_name());
	echo "<br>";
}


