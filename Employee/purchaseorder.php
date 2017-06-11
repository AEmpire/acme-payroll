<?php
require_once 'ClsPurchaseOrder.php';
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/7
 * Time: 18:21
 */
session_start();
$cookieOk = 0;

$clsPurchaseOrder = new ruanjian\ClsPurchaseOrder($_COOKIE,$_GET);

$clsPurchaseOrder->processPageData();

$purchaseorderdata=$clsPurchaseOrder->getPurchaseOrderData($_SESSION['id']);

$clsPurchaseOrder->resetCookie();

?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Add or Edit Employee</title>
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



        //]]></script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div align="center">
    <a href="employeemenu.php">Return to Main Menu</a>
</div>
<h1 align="center">
    Add or Edit Purchase Order
</h1>
<div align="center">
    Please enter the following info for a new employee or choose an employee to edit:
</div>
<div align="center">
<form method="get" action="purchaseorder.php" id="purchaseorder">
    <input type="hidden" name="orderid" value="0" id="orderid" /><b>
        Product
    </b>
    <input type="text" name="name"  size="50" id="name" /><br />
    <b>
        Amount of money
    </b>
    <input type="text" name="money"  size="50" id="money" /><br />
    <b>
        Date
    </b>
    <input type="date" name="date"  size="10" id="date" /><br />
    <b>
        Purchase order status
    </b>
    <label>
        <input type="checkbox" name="status" value="on" id="status" />closed
    </label>
    <br />
    <input type="submit" name="submit" value="Submit" /><input type="reset"  name="reset" value="Reset" /><div><input type="hidden" name=".cgifields" value="open"  /></div></form><br />
</div>
<TABLE border='1' width='100%'><tr>
        <th>
            Edit
        </th>
        <th>
            Product
        </th>
        <th>
            Amonut of money
        </th>
        <th>
            Date
        </th>
        <th>
            Status
        </th>
    </tr>
    <?php foreach ($purchaseorderdata as $purchaseorderdatum):  ?>
        <tr id="<?=$purchaseorderdatum[0];?>">
            <td>
                <?php if ($purchaseorderdatum[5] == 1): ?>
                <input type="button"  name="Edit" value="Edit" onclick="editrec(<?=$purchaseorderdatum[0];?>)" />
                <form method="get" action="purchaseorder.php" id="addeditpurchaseorder">
                    <input type="hidden" name="rowid" value="<?=$purchaseorderdatum[0];?>">
                    <input type="submit" name="submit" id="delete<?=$purchaseorderdatum[0];?>" value="delete" onclick="confirmDelete(<?=$purchaseorderdatum[0];?>)">
                </form>
                <?php endif;?>
            </td>
            <td><?=$purchaseorderdatum[4];?></td> <td><?=$purchaseorderdatum[1];?></td> <td><?=$purchaseorderdatum[2];?></td>
            <td><?=$purchaseorderdatum[5] == 1 ? "Open" : "Closed";?></td>
        </tr>
    <?php endforeach; ?>
</TABLE>
</body>
</html>
