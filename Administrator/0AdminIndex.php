﻿<!DOCTYPE html>
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





    <script type="text/javascript">//<![CDATA[

    function editrec(rowid) {
        var editPurchaseOrderID = rowid;
        var editName=document.getElementById(rowid).cells[1].innerHTML;
        var editMoney = document.getElementById(rowid).cells[2].innerHTML;
        var editDate = document.getElementById(rowid).cells[3].innerHTML;
        var editStatus= document.getElementById(rowid).cells[4].innerHTML;

        document.getElementById("name").value=editName;
        document.getElementById("orderid").value = editPurchaseOrderID;
        document.getElementById("money").value = editMoney;
        document.getElementById("date").value =  editDate;
        document.getElementById("status").checked(editStatus==="closed");
    }

    function confirmDelete($rowid) {
        $id="delete"+$rowid;
        if (confirm("Delete this employee?")){
            document.getElementById($id).value="delete";
        }
        else {
            document.getElementById($id).value="do";
        }

    }
    //]]>
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
                        <a href="2PayrollReports.php"> Payroll Reports</a>
                    </li>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <!--. 页面内容 -->
		<div id="page-wrapper">
		    <div class="header">




		    </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>