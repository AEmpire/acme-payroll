<?php

require_once 'ClsAddEditEmployees.php';

    $clsAddEditEmployees = new ruanjian\ClsAddEditEmployees($_COOKIE, $_GET);

    $clsAddEditEmployees->processPageData();

    $employeeData = $clsAddEditEmployees->getEmployeeData();

    $clsAddEditEmployees->resetCookie();

?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css">

<head>
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
            var hourlywage = document.forms["addeditemployee"]["hourlywage"].value;
            var tax=document.forms["addeditemployee"]["taxdeduction"].value;

            if (!validNamePattern.test(firstname)) {
                alert("First Name must be between 1 and 50 characters and contain no special characters other than - or .");
                return false;
            }

            if (!validNamePattern.test(lastname)) {
                alert("Last Name must be between 1 and 50 characters and contain no special characters other than - or .");
                return false;
            }

            if (isNaN(hourlywage) || hourlywage <= 0) {
                alert("Hourly Wage must be a number greater than 0");
                return false;
            }
            if (isNaN(tax)) {
                alert("Tax cannot be null");
                return false;
            }
        }


        //]]></script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<p>
    <a href="menu.php">Return to Main Menu</a>
</p>
<h1>
    Add or Edit Employee
</h1>
<p>
    Please enter the following info for a new employee or choose an employee to edit:
</p>
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
    <input type="text" name="hourlywage"  size="10" id="hourlywage" /><br />
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

            <form method="get" action="addeditemployees.php" id="addeditemployee">
                <input type="hidden" name="rowid" value="<?=$employeeDatum[0];?>">
                <input type="submit" name="submit" value="delete">
            </form>
        </td>
        <td><?=$employeeDatum[1];?></td> <td><?=$employeeDatum[2];?></td> <td><?=$employeeDatum[3];?></td>
        <td><?=$employeeDatum[4] == 1 ? "Yes" : "No";?></td><td><?=$employeeDatum[5];?></td>
    </tr>
    <?php endforeach; ?>
</TABLE>
</body>
</html>
