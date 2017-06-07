<?php
require_once 'ClsEmployeeReport.php';

/**
 * Created by PhpStorm.
 * User: AEmpire
 * Date: 2017/6/7
 * Time: 18:20
 */

$cookieOk = 0;

$clsEmployeeReport = new ruanjian\ClsEmployeeReport($_COOKIE,$_POST);

$clsEmployeeReport->processPageData();

$clsEmployeeReport->resetCookie();

?>