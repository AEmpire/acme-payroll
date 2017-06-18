<?php
require_once 'ClsPaymentMethod.php';
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/11
 * Time: 12:02
 */
session_start();

$cookieOk = 0;

$clsEmployeeReport = new ruanjian\ClsPaymentMethod($_COOKIE,$_GET);

$clsEmployeeReport->processPageData();

$clsEmployeeReport->resetCookie();

?>
<?php if ($_GET['payment']=='pick-up'||isset($_GET['submit'])):?>
<html lang="en-US" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1; url=3PaymentMethod.php">
    <script type="text/javascript">
        window.location.href = "3PaymentMethod.php"
    </script>
    <title>Page Redirection</title>
</head>
<body>

If you are not redirected automatically, follow this <a href='3PaymentMethod.php'></a>
</body>
</html>
<?php else:?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <!-- Bootstrap Styles-->
    <link href="../css/bootstrap.css" rel="stylesheet" />

    <!-- Custom Styles-->
    <link href="../css/custom-styles.css" rel="stylesheet" />
    <title>Edit Payment Method</title>
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
<h1 align="center">
    Edit Payment Method
</h1>
<div align="center">
<?php if ($_GET['payment']=='mail'):?>
<form action="selectpaymentmethod.php">
    <input type="hidden" name="payment" value="<?=$_GET['payment'];?>">
    <b>Please enter your email address:
        <input type="email" name="mail">
    </b>
    <input type="submit" name="submit" value="submit">;
</form>
<?php else:?>
<form action="selectpaymentmethod.php">
    <input type="hidden" name="payment" value="<?=$_GET['payment'];?>">
    <b>
    Please enter your bank account:<br>
        Bank name:
        <input type="text" name="bank"><br>
        Account number:
        <input type="text" name="num"><br>
    </b>
    <input type="submit" name="submit" value="submit">
</form>
<?php endif;?>
</div>
        </div>
    </div>
</div>
</body>
<?php endif;?>
