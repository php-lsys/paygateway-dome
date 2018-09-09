<?php
use LSYS\PayGateway\Pay\PayAdapter;

require_once  __DIR__."/Bootstarp.php";
require_once  __DIR__."/pay_public.php";
$mgr=LSYS\PayGateway\DI::get()->paygateway_paymgr();

function to_pay($name,$bank=null){
	echo " <a href='./pay.php?name={$name}&key={$bank}&amount=0.01'>pay click</a> ";
}

foreach ($mgr->find_all(PayAdapter::TYPE_WECHAT) as $v){
    $k=$v->get_name();
    $keys=$v->pay_more_key();
    if (is_array($keys)){
        echo "items:<div>";
        foreach ($keys as $key){
            echo "item: ".$k."-".$key;
            to_pay($k,$key);
            echo "<br>";
        }
        echo "</div>";
    }else{
        echo "item:<div>";
        echo "".$k;
        to_pay($k);
        echo "</div>";
    }
}

