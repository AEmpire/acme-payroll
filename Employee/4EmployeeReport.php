
<?php
require_once 'ClsEmployeeReport.php';

/**
 * Created by PhpStorm.
 * User: AEmpire
 * Date: 2017/6/7
 * Time: 18:20
 */
session_start();

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

		    </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>