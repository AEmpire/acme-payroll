<?php
require_once 'ClsMenu.php';


$cookieOk = 0;

$clsDefault = new ruanjian\ClsMenu($_COOKIE,$_POST);

$clsDefault->processPageData();

$employeesData=$clsDefault->getEmployees();
$clsDefault->resetCookie();

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
                <a class="navbar-brand" href="0AdminIndex.php"><strong> ADMIN</strong></a>
				
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
                        <a href="1ManageEmployees.php"></i> Manage Employees</a>
                    </li>

                    <li>
                        <a class="active-menu" href="#"> Payroll Reports</a>
                    </li>




                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <!--. 页面内容 -->
        <div id="page-wrapper">
            <div align="center">
            <form method="get" action="payrollreports.php" >
                <h1>
                    Generate Payroll Reports
                </h1><br/>
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

		    </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>