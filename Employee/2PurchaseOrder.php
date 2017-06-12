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
                <a class="navbar-brand" href="employeeMenu.html"><strong> EMPLOYEE</strong></a>
				
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

                    <li>
                        <a class="active-menu" href="#"> Purchase Order</a>
                    </li> 
					 
                    <li>
                        <a href="3PaymentMethod.php"> Payment Method<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.html">Pick Up</a>
                            </li>
                            <li>
                                <a href="morris-chart.html">Mail</a
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

        <!--. 页面内容 -->
		<div id="page-wrapper">
		    <div class="header">


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
		</div>


        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>