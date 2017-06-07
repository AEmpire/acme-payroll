<?php
require_once 'ClsTimeCard.php';
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/7
 * Time: 18:16
 */
$cookieOk = 0;

$clsTimeCard = new ruanjian\ClsTimeCard($_COOKIE,$_POST);

$clsTimeCard->processPageData();

$clsTimeCard->resetCookie();

?>