<?php
require_once 'ClsPayrollReports.php';
/**
 * Created by PhpStorm.
 * User: AEmpire
 * Date: 3/4/17
 * Time: 9:18 PM
 */


$clsPayrollReports = new ruanjian\ClsPayrollReports($_COOKIE,$_GET);

$clsPayrollReports->processPageData();

$weeks = $clsPayrollReports->getWeeks();
$years = $clsPayrollReports->getYears();

$weekSelected = $clsPayrollReports->getWeekSelected();
$yearSelected = $clsPayrollReports->getYearSelected();

$payrollDataCalculated = $clsPayrollReports->getPayrollDataCalculated();

$clsPayrollReports->resetCookie();
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
<form method="get" action="payrollreports.php"><h2>
        Payroll Report for </h2>
    <b>Week:</b>
    <label>
        <select name="week">

            <?php foreach ($weeks as $week): ?>
            <option
            <?=$weekSelected == $week ? 'selected="selected"' : '';?> value="<?=$week;?>"><?=$week;?></option>
            <?php endforeach; ?>

        </select>
    </label><b> and Year: </b>

    <label>
        <select name="year">

            <?php foreach ($years as $year): ?>
            <option
            <?=$yearSelected == $year ? 'selected="selected"' : '';?> value="<?=$year;?>"><?=$year;?></option>
            <?php endforeach; ?>

        </select>
    </label>
    <input type="submit" name=".submit" value="Run Different Report" />
</form><br />

<TABLE border='1' width='100%'><tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Hours</th>
        <th>Wage</th>
        <th>Exempt</th>
        <th>Base Pay</th>
        <th>Overtime Pay</th>
        <th>Gross Pay</th>
    </tr>

    <?php foreach ($payrollDataCalculated as $payrollDatumCalculated): ?>

    <tr id="<?=$payrollDatumCalculated[0];?>">
        <td><?=$payrollDatumCalculated[1];?></td>
        <td><?=$payrollDatumCalculated[2];?></td>
        <td><?=number_format($payrollDatumCalculated[3],2);?></td>
        <td><?=$payrollDatumCalculated[4] == '' ? '' : '$' . number_format($payrollDatumCalculated[4],2);?></td>
        <td><?=$payrollDatumCalculated[5] == 1 ? 'Yes' : 'No';?></td>
        <td><?='$' . number_format($payrollDatumCalculated[6],2);?></td>
        <td><?='$' . number_format($payrollDatumCalculated[7],2);?></td>
        <td><?='$' . number_format($payrollDatumCalculated[8],2);?></td>
    </tr>

    <?php endforeach; ?>

</TABLE>
</body>
</html>
