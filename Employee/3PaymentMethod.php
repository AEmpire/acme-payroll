
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
            <a class="navbar-brand" href="employeeMenu.html"><strong> EMPLOYEE</strong></a>

            <div id="sideNav" href="">
                <a  href="../login.html"> <small>Logout</small></a>
            </div>
        </div>








    </nav>
    <!--/. NAV TOP  -->

    <!--  侧边栏 -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="1Timecard.php"></i> Timecard</a>
                </li>

                <li>
                    <a href="2PurchaseOrder.php"> Purchase Order</a>
                </li>

                <li>
                    <a class="active-menu" href="#"> Payment Method<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="chart.html">Pick Up</a>
                        </li>
                        <li>
                            <a href="morris-chart.html">Mail</a>
                        </li>
                        <li>
                            <a href="morris-chart.html">Direct Deposit</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="4EmployeeReport.php"></i> Generate Payroll Reports</a>
                </li>

            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->

    <!--  页面内容  -->
    <div id="page-wrapper">
        <div class="header">
            <h1 align="center">
                Edit Payment Method
            </h1>

            <div align="center">
                <?php if ($_GET['payment']=='mail'):?>
                    <form action="selectpaymentmethod.php">
                        <input type="hidden" name="payment" value="<?=$_GET['payment'];?>">
                        <b>Please enter your email address:
                            <input type="email" name="mail">
                        </b>
                        <input type="submit" name="submit" value="submit">;
                    </form>
                <?php else:?>
                    <form action="selectpaymentmethod.php">
                        <input type="hidden" name="payment" value="<?=$_GET['payment'];?>">
                        <b>
                            Please enter your bank account:<br>
                            Bank name:
                            <input type="text" name="bank"><br>
                            Account number:
                            <input type="text" name="num"><br>
                        </b>
                        <input type="submit" name="submit" value="submit">
                    </form>
                <?php endif;?>
            </div>

        </div>


    </div>
    <!-- /. PAGE WRAPPER  -->
</div>

</body>

</html>