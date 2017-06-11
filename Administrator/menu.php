<?php
require_once 'ClsMenu.php';


$cookieOk = 0;

$clsDefault = new ruanjian\ClsMenu($_COOKIE,$_POST);

$clsDefault->processPageData();

$employeesData=$clsDefault->getEmployees();
$clsDefault->resetCookie();

?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css">

<head>
<title>Main Menu</title>
</head>
<body>
<h1 align="center">
	Main Menu
</h1>
<div align="center">
	Please choose from the following functions:
</div>
    <div align="center">
	<a href="addeditemployees.php">Add New or Edit Existing Employee</a>
</div>
<div align="center">
<form method="get" action="payrollreports.php" >
    <b>
	Generate Payroll Reports
</b><br/>
    Report type:

<select name="reporttype" >
    <option value="total hours">total hours</option>
    <option value="pay year-to-date">pay year-to-date</option>
</select><br/>
	 from
<input name="firstdate" type="date"> to <input name="lastdate" type="date"><br/>
    of employee:
    <select name="id">
        <?php foreach ($employeesData as $datum):?>
        <option value="<?=$datum['employee_id']?>"><?=$datum['employee_id']?></option>
        <?php endforeach;?>
    </select>
<input type="submit" name=".submit" value="Go" /></form><br><br>
</div>
<div align="center">
<form method="get" action="../ProcessLogout.php">
    </select><input type="submit" name=".submit" value="Logout" /></form>
</form>
</div>
</body>
</html>

