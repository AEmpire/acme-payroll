<?php
require_once 'ClsEmployeeReport.php';

/**
 * Created by PhpStorm.
 * User: AEmpire
 * Date: 2017/6/7
 * Time: 18:20
 */
session_start();

$cookieOk = 0;

$clsEmployeeReport = new ruanjian\ClsEmployeeReport($_COOKIE,$_GET);

$clsEmployeeReport->processPageData();

$totalHours=$clsEmployeeReport->getTotalHours();

$totalPayroll=$clsEmployeeReport->getPayrollData();

$projectData=$clsEmployeeReport->getProjectData();

$vacationDays=$clsEmployeeReport->getVacation();


$clsEmployeeReport->resetCookie();

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
<p><a href="employeemenu.php">Return to Main Menu</a></p>
<?php if ($_GET['reporttype']=='total hours'):?>
<table align="center" border="1" >
    <tr>
        <th>
            Charge Number
        </th>
        <th>
            Hours Worked
        </th>
    </tr>
    <?php foreach ($projectData as $projectDatum):?>
    <tr>
        <th>
            <?=$projectDatum['charge_num'];?>
        </th>
        <th>
            <?=$clsEmployeeReport->getTotalHoursForProject($projectDatum['charge_num']);?>
        </th>
    </tr>
    <?php endforeach;?>
    <tr>
        <th>
            total
        </th>
        <th>
            <?=$totalHours;?>
        </th>
    </tr>
</table>
<?php elseif($_GET['reporttype']=='vacation'):?>
<table align="center" border="1" >
    <tr>
        <th>
            Employee ID
        </th>
        <th>
            Total Vacation
        </th>
    </tr>
    <tr>
        <th>
            <?=$_SESSION['id']?>
        </th>
        <th>
            <?=$vacationDays?>
        </th>
    </tr>
</table>
<?php else:?>
<table align="center" border="1" >
    <tr>
        <th>
            Employee ID
        </th>
        <th>
            Total Pay
        </th>
    </tr>
    <tr>
        <th>
            <?=$_SESSION['id']?>
        </th>
        <th>
            <?=$totalPayroll?>
        </th>
    </tr>
</table>
<?php endif;?>
</body>
</html>

