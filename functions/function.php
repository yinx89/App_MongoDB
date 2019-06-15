<?php

$array = array();
$transacciones_usuario = array();
$count_stop = 0;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$per = isset($_GET['per']) ? intval($_GET['per']) : 10;
$stop = isset($_GET['stop']) ? intval($_GET['stop']) : false;

$m = new MongoDB\Driver\Manager("mongodb://user:pass@domain:port/database");
$qOpts = array('limit' => $per, 'skip' => $per * ($page - 1));
$query = new MongoDB\Driver\Query(array(), $qOpts);
$c1 = $m->executeQuery("afterbanks.customers", $query);

foreach ($c1 as $c) {

    $count = 0;
    $arr = $c->transactions;

    foreach ($arr as $trans) {
        if ($trans->totalTransactions != 0) {
            //   Calcula el total de las transacciones que son distintas de 0
            $count += $trans->transactionCalculations->savingCapacity;
            array_push($transacciones_usuario, array('_id'=>$trans->_id));
        }
    }

    array_push($array, array('_id'=>$c->_id,'userId'=>$c->userId,'accounts'=>count($c->accounts),'savingCapacity'=>$count, 'transactions'=>$transacciones_usuario));
    $count_stop +=1;
}

if ($count_stop<$per) {
    $stop = true;
}

$array = array('lists' =>$array, 'stop' =>$stop);
echo json_encode($array);
