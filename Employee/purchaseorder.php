<?php
require_once 'ClsPurchaseOrder.php';
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/7
 * Time: 18:21
 */
$cookieOk = 0;

$clsPurchaseOrder = new ruanjian\ClsPurchaseOrder($_COOKIE,$_POST);

$clsPurchaseOrder->processPageData();

$clsPurchaseOrder->resetCookie();

?>