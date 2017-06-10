<?php
require_once 'ClsPayrollReports.php';
/**
 * Created by PhpStorm.
 * User: AEmpire
 * Date: 3/4/17
 * Time: 9:18 PM
 */

session_start();

$clsPayrollReports = new ruanjian\ClsPayrollReports($_COOKIE,$_GET);

$clsPayrollReports->processPageData();

$totalHours=$clsPayrollReports->getTotalHours();

$totalPayroll=$clsPayrollReports->getPayrollData();

$clsPayrollReports->resetCookie();

echo $totalPayroll;
echo $totalHours;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<head>
    <script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"  type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous" type="text/javascript"></script>

    <title>Payroll Reports</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<p><a href="menu.php">Return to Main Menu</a></p>

</body>
</html>
