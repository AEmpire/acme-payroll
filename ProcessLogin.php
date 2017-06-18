<?php
require_once 'ClsLogin.php';

$utility = new ruanjian\ClsLogin($_GET['username'],$_GET['password'],$_GET['type']);
$authOK = false;
$authOK=$utility->checkLogin();
?>
<?php if ($authOK == false):  ?>
        <html lang="en-US">
            <head>
                <title>Invalid Username or Bad Password</title>
            </head>
            <body>
                Invalid Username or Bad Password <br>
            </body>
        </html>
<?php elseif($_GET['type']=='admin'): ?>
    <html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1; url=Administrator/0AdminIndex.php">
        <script type="text/javascript">
            window.location.href = "Administrator/0AdminIndex.php"
        </script>
        <title>Page Redirection</title>
    </head>
    <body>

    If you are not redirected automatically, follow this <a href='Administrator/0AdminIndex.php'></a>
        </body>
    </html>
    <?php else:
    session_start();
    $_SESSION['type']=$authOK;
    $_SESSION['id']=$_GET['username'];
    ?>

    <html lang="en-US">
    <head>
        <meta charset="UTF-8">    <meta http-equiv="refresh" content="1; url=Employee/0EmployeeIndex.php">
        <script type="text/javascript">
            window.location.href = "Employee/0EmployeeIndex.php"
        </script>
        <title>Page Redirection</title>
    </head>
    <body>

    If you are not redirected automatically, follow this <a href='Employee/0EmployeeIndex.php'></a>.
    </body>
    </html>
    <?php endif; ?>
