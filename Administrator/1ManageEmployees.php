<?php

require_once 'ClsAddEditEmployees.php';

$clsAddEditEmployees = new ruanjian\ClsAddEditEmployees($_COOKIE, $_GET);

$clsAddEditEmployees->processPageData();

$employeeData = $clsAddEditEmployees->getEmployeeData();

$clsAddEditEmployees->resetCookie();

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




    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Add or Edit Employee</title>
    <script type="text/javascript">//<![CDATA[

        function editrec(rowid,tax) {
            var editEmployeeID = rowid;
            var editStandardTax=tax;
            var editFirstName = document.getElementById(rowid).cells[1].innerHTML;
            var editLastName = document.getElementById(rowid).cells[2].innerHTML;
            var editHourlyWage = document.getElementById(rowid).cells[3].innerHTML;
            var editExemptFlag = document.getElementById(rowid).cells[6].innerHTML;
            var editType=document.getElementById(rowid).cells[7].innerHTML;
            var editSalary=document.getElementById(rowid).cells[4].innerHTML;
            var editCommissionRate=document.getElementById(rowid).cells[5].innerHTML;


            document.getElementById("employeeid").value = editEmployeeID;
            document.getElementById("taxdeduction").value = editStandardTax;
            document.getElementById("firstname").value =  editFirstName;
            document.getElementById("lastname").value =  editLastName;
            document.getElementById("hourlywage").value =  editHourlyWage;
            document.getElementById("exempt").checked =  (editExemptFlag === "Yes");
            document.getElementById("type").value=editType;
            document.getElementById("salary").value=editSalary;
            document.getElementById("commision_rate").value=editCommissionRate;
            selectType();
        }

        function validateform() {

            var validNamePattern = new RegExp(/^[A-z0-9 \.\-]{1,50}$/);
            var firstname = document.forms["addeditemployee"]["firstname"].value;
            var lastname = document.forms["addeditemployee"]["lastname"].value;
            var tax=document.forms["addeditemployee"]["taxdeduction"].value;

            if (!validNamePattern.test(firstname)) {
                alert("First Name must be between 1 and 50 characters and contain no special characters other than - or .");
                return false;
            }

            if (!validNamePattern.test(lastname)) {
                alert("Last Name must be between 1 and 50 characters and contain no special characters other than - or .");
                return false;
            }

            if (isNaN(tax)) {
                alert("Tax cannot be null");
                return false;
            }
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
        function selectType() {
            if (document.getElementById("type").value==="hourly"){
                document.getElementById("hourly").style.display="block";
                document.getElementById("employee_commission_rate").style.display="none";
                document.getElementById("employee_salary").style.display="none";
            }
            else if (document.getElementById("type").value==="salary"){
                document.getElementById("hourly").style.display="none";
                document.getElementById("employee_commission_rate").style.display="none";
                document.getElementById("employee_salary").style.display="block";
            }
            else {
                document.getElementById("hourly").style.display="none";
                document.getElementById("employee_commission_rate").style.display="block";
                document.getElementById("employee_salary").style.display="block";
            }
        }
        //]]></script>
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
                <a class="navbar-brand" href="0AdminIndex.php"><strong> ADMIN</strong></a>
				
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
                        <a class="active-menu" href="#"></i> Manage Employees</a>
                    </li>

                    <li>
                        <a href="2PayrollReports.php"> Payroll Reports</a>
                    </li> 
					 


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <!--  页面内容  -->
		<div id="page-wrapper">
		    <div class="header">

                <h1 align="center">
                    Add or Edit Employee
                </h1>
                <div align="center">
                    <form method="get" action="1ManageEmployees.php" id="addeditemployee" onsubmit="return validateform();">
                        <input type="hidden" name="employeeid" value="0" id="employeeid" />
                        <div style="padding-top: 5px">
                            First Name of Employee:

                        <input type="text" name="firstname"  size="20" id="firstname" />
                        </div>
                        <div style="padding-top: 5px">
                            Last Name of Employee:
                        <input type="text" name="lastname"  size="20" id="lastname" />
                        </div>
                        <div style="padding-top: 5px">
                            employeetype:
                            <select  name="type" id="type" onchange="selectType()">
                                <option value="" selected="selected" disabled="disabled">choose employee type</option>
                                <option value="hourly">hourly</option>
                                <option value="commision">commision</option>
                                <option value="salary">salary</option>
                            </select>
                        </div>
                        <div id="hourly" style="display: none;padding-top: 5px">
                            Hourly Wage:
                            <input type="text"  name="hourlywage" value="0" size="20" id="hourlywage" /><br />
                        </div>
                        <div id="employee_salary" style="display: none;padding-top: 5px">
                            Salary:
                            <input value="0" name="salary" size="20" id="salary" />
                        </div>
                        <div id="employee_commission_rate" style="display: none;padding-top: 5px">
                            Commission rate:
                            <select name="commision_rate" id="commision_rate">
                                <option value="0">choose commision rate</option>
                                <option value="0.15">15%</option>
                                <option value="0.25">25%</option>
                                <option value="0.35">35%</option>
                            </select>
                        </div>
                        <div style="padding-top: 5px">
                            tax deductions
                            <input type="text" name="taxdeduction" size="10" id="taxdeduction">
                        </div>
                        <div style="padding-top: 5px">
                            Employee is exempt from overtime pay

                        <label>
                            <input type="checkbox" name="exempt" value="on" id="exempt" />exempt
                        </label>
                        </div>
                        <br />
                        <input type="submit" name="submit" value="Submit" /><input type="reset"  name="reset" value="Reset" /><div><input type="hidden" name=".cgifields" value="exempt"  /></div></form><br />
                </div>
                <TABLE border='1' width='100%'><tr>
                        <th>
                            Edit
                        </th>
                        <th>
                            First Name
                        </th>
                        <th>
                            Last Name
                        </th>
                        <th>
                            Wage
                        </th>
                        <th>
                            Salary
                        </th>
                        <th>
                            Commission rate
                        </th>
                        <th>
                            Exempt
                        </th>
                        <th>
                            Employee Type
                        </th>
                    </tr>
                    <?php foreach ($employeeData as $employeeDatum):  ?>
                        <tr id="<?=$employeeDatum[0];?>">
                            <td><input type="button"  name="Edit" value="Edit" onclick="editrec(<?=$employeeDatum[0];?>,<?=$employeeDatum[6];?>)" />
                                <form method="get" action="1ManageEmployees.php" id="deleteemployee">
                                    <input type="hidden" name="rowid" value="<?=$employeeDatum[0];?>">
                                    <input type="submit" name="submit" value="delete" id="delete<?=$employeeDatum[0];?>" onclick="confirmDelete(<?=$employeeDatum[0];?>)">
                                </form>

                            </td>
                            <td><?=$employeeDatum[1];?></td> <td><?=$employeeDatum[2];?></td> <td><?=$employeeDatum[3];?></td><td><?=$employeeDatum[7];?></td><td><?=$employeeDatum[8];?></td>
                            <td><?=$employeeDatum[4] == 1 ? "Yes" : "No";?></td><td><?=$employeeDatum[5];?></td>
                        </tr>
                    <?php endforeach; ?>
                </TABLE>

		    </div>


        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>