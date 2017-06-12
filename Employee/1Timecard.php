
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
                        <a class="active-menu" href="#"></i> Timecard</a>
                    </li>

                    <li>
                        <a href="2PurchaseOrder.php"> Purchase Order</a>
                    </li> 
					 
                    <li>
                        <a href="3PaymentMethod.php"> Payment Method<span class="fa arrow"></span></a>
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

              <h1 align="center">Time Card</h1>
              <TABLE border='1'>
                  <tr>
                      <th>
                          Date
                      </th>
                      <th>
                          Charge Number
                      </th>
                      <th>
                          Hours Worked
                      </th>
                      <th>
                          Status
                      </th>
                  </tr>
                  <?php foreach ($timeCard as $item):  ?>

                  <?php if ($item[3]==date('Y-m-d')&&$item[1]=="Unsubmitted"):?>
                  <tr>

                      <td><?=$item[3];?></td>
                      <form action="timecard.php" method="get">
                          <?php if ($_SESSION['type']!='commision'):?>
                          <td><select name="Charge_num">
                              <?php foreach ($projectData as $projectDatum): ?>
                              <option value="<?=$projectDatum[0];?>"><?=$projectDatum[0];?></option>
                              <?php endforeach;?>
                          </select> </td>
                          <?php else:?>
                          <td><input name="Charge_num" type="hidden" value="">null</td>
                          <?php endif;?>
                          <td><input type="text" name="timeworked"></td>
                          <td><input type="submit" name="status" value="submitted"></td>
                      </form>
                  </tr>
                  <?php else:?>
                  <tr>
                      <td><?=$item[3];?></td>
                      <?php if ($_SESSION['type']!='commision'):?>
                      <td><?=$item[2];?></td>
                      <?php else:?>
                      <td>null</td>
                      <?php endif;?>
                      <td><?=$item[0];?></td>
                      <td><?=$item[1];?></td>
                  </tr>
                  <?php endif?>
                  <?php endforeach; ?>
                  <div>

                  </div>
              </TABLE>

		</div>


        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>