<?php
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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<head>
    <script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"  type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous" type="text/javascript"></script>

    <title>Welcome <?=$employeeData[0][0];?>!</title>
<body>
<h1 align="center">
    Welcome <?=$employeeData[0][0];?>!
</h1>
<div align="center">
<a href="timecard.php">timecard</a><br>
</div>

<?php if ($employeeData[0][4]=='commision'):?>
<div align="center">
<a href="purchaseorder.php">Purchase Order</a>
</div>
<?php endif; ?>
    <div align="center">
<form action="selectpaymentmethod.php" method="get">
    Please choose a payment method:
    <select name="payment">
        <option value="pick-up">Pick up</option>
        <option value="mail">Mail</option>
        <option value="direct-deposit">Direct deposit</option>
    </select>
    <input type="submit" name=".submit" value="Go" />
</form>
    </div>
<div align="center">
<form method="get" action="employeereport.php" >
    <b>
        Generate Payroll Reports
    </b><br/>
    Report type:
    <select name="reporttype" >
        <option value="total hours">total hours</option>
        <option value="pay year-to-date">pay year-to-date</option>
        <option value="vacation">vacation/sick leave</option>
    </select><br/>
    from
    <input name="firstdate" type="date"> to <input name="lastdate" type="date"><br/>
    <input type="submit" name=".submit" value="Go" /></form><br><br>
</div>
<div align="center">
<form method="get" action="../ProcessLogout.php">
    <input type="submit" name=".submit" value="Logout" /></form>
</div>
</body>
