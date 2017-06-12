
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
            var editExemptFlag = document.getElementById(rowid).cells[4].innerHTML;

            document.getElementById("employeeid").value = editEmployeeID;
            document.getElementById("taxdeduction").value = editStandardTax;
            document.getElementById("firstname").value =  editFirstName;
            document.getElementById("lastname").value =  editLastName;
            document.getElementById("hourlywage").value =  editHourlyWage;
            document.getElementById("exempt").checked =  (editExemptFlag === "Yes");
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
                <a class="navbar-brand" href="employeeMenu.html"><strong> ADMIN</strong></a>
				
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
                    Please enter the following info for a new employee or choose an employee to edit:
                </div>
                <div align="center">
                    <form method="get" action="addeditemployees.php" id="addeditemployee" onsubmit="return validateform();">
                        <input type="hidden" name="employeeid" value="0" id="employeeid" /><b>
                            First Name of Employee:
                        </b>
                        <input type="text" name="firstname"  size="50" id="firstname" /><br />
                        <b>
                            Last Name of Employee:
                        </b>
                        <input type="text" name="lastname"  size="50" id="lastname" /><br />
                        <b>
                            Hourly Wage
                        </b>
                        <input type="text" name="hourlywage"  value="0" size="10" id="hourlywage" /><br />
                        <b>
                            employeetype:
                        </b>
                        <b>
                            <select name="type">
                                <option value="hourly">hourly</option>
                                <option value="commision">commision</option>
                                <option value="salary">salary</option>
                            </select><br/>
                        </b>
                        <b>
                            tax deductions
                        </b>
                        <b>
                            <input type="text" name="taxdeduction" size="10" id="taxdeduction"><br/>
                        </b>
                        <b>
                            Employee is exempt from overtime pay
                        </b>
                        <label>
                            <input type="checkbox" name="exempt" value="on" id="exempt" />exempt
                        </label>
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
                            Exempt
                        </th>
                        <th>
                            Employee Type
                        </th>
                    </tr>
                    <?php foreach ($employeeData as $employeeDatum):  ?>
                        <tr id="<?=$employeeDatum[0];?>">
                            <td><input type="button"  name="Edit" value="Edit" onclick="editrec(<?=$employeeDatum[0];?>,<?=$employeeDatum[6];?>)" />
                                <form method="get" action="addeditemployees.php" id="deleteemployee">
                                    <input type="hidden" name="rowid" value="<?=$employeeDatum[0];?>">
                                    <input type="submit" name="submit" value="delete" id="delete<?=$employeeDatum[0];?>" onclick="confirmDelete(<?=$employeeDatum[0];?>)">
                                </form>

                            </td>
                            <td><?=$employeeDatum[1];?></td> <td><?=$employeeDatum[2];?></td> <td><?=$employeeDatum[3];?></td>
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
