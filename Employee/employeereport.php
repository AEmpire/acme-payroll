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
    <script type="text/javascript">
        function printHtml(html) {
            var bodyHtml = document.body.innerHTML;
            document.body.innerHTML = html;
            window.print();
            document.body.innerHTML = bodyHtml;
        }
        function onprint() {
            var html = $("#printArea").html();
            printHtml(html);
        }
    </script>
    <title>Payroll Reports</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<p><a href="employeemenu.php">Return to Main Menu</a></p>
<div id="printArea">
<?php if ($_GET['reporttype']=='total hours'):?>
<table align="center" border="1" >
    <tr>
        <th>
            Charge Number
        </th>
        <th>
            Hours Worked
        </th>
        <th>
            Start
        </th>
        <th>
            End
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
        <th>
            <?=$_GET['firstdate']?>
        </th>
        <th>
            <?=$_GET['lastdate']?>
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
        <th>
            <?=$_GET['firstdate']?>
        </th>
        <th>
            <?=$_GET['lastdate']?>
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
        <th>
            Start
        </th>
        <th>
            End
        </th>
    </tr>
    <tr>
        <th>
            <?=$_SESSION['id']?>
        </th>
        <th>
            <?=$vacationDays?>
        </th>
        <th>
            <?=$_GET['firstdate']?>
        </th>
        <th>
            <?=$_GET['lastdate']?>
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
        <th>
            Start
        </th>
        <th>
            End
        </th>
    </tr>
    <tr>
        <th>
            <?=$_SESSION['id']?>
        </th>
        <th>
            <?=$totalPayroll?>
        </th>
        <th>
            <?=$_GET['firstdate']?>
        </th>
        <th>
            <?=$_GET['lastdate']?>
        </th>
    </tr>
</table>
<?php endif;?>
</div>
<div align="center">
<input type="button" id="btnPrint" onclick="onprint()" value="print" />
</div>
</body>
</html>

