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


    <title>Payroll Reports</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

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

    <!--. 侧边栏 -->
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
                    <a href="3PaymentMethod.php"> Payment Method</a>
                </li>

                <li>
                    <a class="active-menu" href="#"></i> Generate Payroll Reports</a>
                </li>

            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <!--. 页面内容 -->
    <div id="page-wrapper">
        <div class="header">
            <br><br>
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

    </div>
</div>
</body>
</html>

