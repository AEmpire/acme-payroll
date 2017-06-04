<?php
require_once 'ClsDefault.php';


$cookieOk = 0;

$clsDefault = new ruanjian\ClsDefault($_COOKIE,$_POST);

$clsDefault->processPageData();

$cookieOk = $clsDefault->getCookieOk();

if ($cookieOk == 0) {
    echo $clsDefault->getCookieNotOkText();
    exit(0);
}

$weeks = $clsDefault->getWeeks();
$years = $clsDefault->getYears();

$clsDefault->resetCookie();

?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css">

<head>
<title>Main Menu</title>
</head>
<body>
<h1>
	Main Menu
</h1>
<p>
	Please choose from the following functions:
</p>
<p>
	<a href="addeditemployees.php">Add New or Edit Existing Employee</a>
</p>
<form method="get" action="payrollentry.php" ><b>
	Enter Payroll Info for Week:
</b>
<select name="week" >
    <?php foreach ($weeks as $week): ?>
    <option value="<?=$week?>"><?=$week?></option>
    <?php endforeach; ?>
</select><b>
	 and Year:
</b>
<select name="year" >
    <?php foreach ($years as $year): ?>
    <option value="<?=$year?>"><?=$year?></option>
    <?php endforeach; ?>
</select><input type="submit" name=".submit" value="Go" /></form><br />
<form method="get" action="payrollreports.php" ><b>
	Generate Payroll Reports for Week:
</b>
<select name="week" >
    <?php foreach ($weeks as $week): ?>
    <option value="<?=$week?>"><?=$week?></option>
    <?php endforeach; ?>
</select><b>
	 and Year:
</b>
<select name="year" >
    <?php foreach ($years as $year): ?>
        <option value="<?=$year?>"><?=$year?></option>
    <?php endforeach; ?>
</select><input type="submit" name=".submit" value="Go" /></form><br><br>
<form method="post" action="ProcessLogout.php" enctype="multipart/form-data">
    </select><input type="submit" name=".submit" value="Logout" /></form>
</form>
</body>
</html>

