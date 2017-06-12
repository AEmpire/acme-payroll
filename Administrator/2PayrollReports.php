<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>BRILLIANT Free Bootstrap Admin Template</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">


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
                <a class="navbar-brand" href="employeeMenu.html"><strong> ADMIN</strong></a>
				
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
		    <div class="header">
                <div id="printArea">
                    <?php if ($_GET['reporttype']=='total hours'):?>
                        <table align="center" border="1" >
                            <tr>
                                <th>
                                    Employee ID
                                </th>
                                <th>
                                    Total Hours
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
                                    <?=$_GET['id']?>
                                </th>
                                <th>
                                    <?=$totalHours?>
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
                        <table align="center" border="1" id="printArea">
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
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>