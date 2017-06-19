﻿﻿<?php
require_once 'ClsMenuEmp.php';
/**
 * Created by PhpStorm.
 * User: AEmpre
 * Date: 2017/6/7
 * Time: 9:50
 */
session_start();

$cookieOk = 0;

$clsMenuEmp = new ruanjian\ClsMenuEmp($_COOKIE,$_POST);
$clsMenuEmp->processPageData();
$employeeData = $clsMenuEmp->getEmployeeData();
$clsMenuEmp->resetCookie();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>BRILLIANT Free Bootstrap Admin Template</title>
    <!-- Bootstrap Styles-->
    <link href="../css/bootstrap.css" rel="stylesheet" />

    <!-- Custom Styles-->
    <link href="../css/custom-styles.css" rel="stylesheet" />
</head>

<body>
<div id="wrapper">
    <!--. 顶端栏 -->
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="0EmployeeIndex.php"><strong> EMPLOYEE</strong></a>

            <div id="sideNav" href="">
                <a  href="../login.html"> <small>Logout</small></a>
            </div>
        </div>








    </nav>
    <!--/. NAV TOP  -->

    <!--  侧边栏 -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="1Timecard.php"></i> Timecard</a>
                </li>

                <?php if ($_SESSION['type']=='commision'):?>
                    <li>
                        <a href="2PurchaseOrder.php"> Purchase Order</a>
                    </li>
                <?php endif;?>

                <li>
                    <a class="active-menu" href="#"> Payment Method</a>
                </li>

                <li>
                    <a href="4EmployeeReport.php"></i> Generate Payroll Reports</a>
                </li>

            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->

    <!--  页面内容  -->
    <div id="page-wrapper">
        <div class="header">
            <div align="center">
                <form action="selectpaymentmethod.php" method="get">
                    Please choose a payment method:
                    <select name='payment'>
                        <option value="pick-up">Pick up</option>
                        <option value="mail">Mail</option>
                        <option value="direct-deposit">Direct deposit</option>
                    </select>
                    <input type="submit" name=".submit" value="Go" />
                </form>
            </div>
            </div>
            </div>

        </div>


    </div>
    <!-- /. PAGE WRAPPER  -->
</div>

</body>

</html>