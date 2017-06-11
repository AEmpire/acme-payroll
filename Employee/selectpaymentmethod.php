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
<?php if ($_GET['payment']=='pick-up'):?>
<html lang="en-US" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1; url=employeemenu.php">
    <script type="text/javascript">
        window.location.href = "employeemenu.php"
    </script>
    <title>Page Redirection</title>
</head>
<body>

If you are not redirected automatically, follow this <a href='employeemenu.php'></a>
</body>
</html>
<?php else:?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Edit Payment Method</title>
</head>
<body>
<h1 align="center">
    Edit Payment Method
</h1>
<div align="center">
    <a href="employeemenu.php">Return to Main Menu</a>
</div>
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
</body>
<?php endif;?>
