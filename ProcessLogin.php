<?php
require_once 'ClsLogin.php';

$utility = new ruanjian\ClsLogin($_GET['username'],$_GET['password'],$_GET['type']);
$authOK = false;
$authOK=$utility->checkLogin();
?>
<?php if ($authOK == false):  ?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <title>Login Screen</title>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/LoginStyle.css" media="screen" type="text/css" />
</head>
<body>
<h1 align="center">Welcome to Acme Payroll.</h1>
<p><h2 align="center">Please login.</h2>

<Form Action="ProcessLogin.php" METHOD="get">
    <p>
        <INPUT TYPE="text" NAME="username" class="name" placeholder="username" SIZE=20>
        <br>
        <INPUT TYPE="password" NAME="password" class="name" placeholder="password" SIZE=20>
        <br>
        :
        <select name="type" >
            <option value="employee">employee</option>
            <option value="admin">admin</option>
        </select><br/>
    </p>
    <INPUT TYPE="submit" NAME="submitlogin" value="Login">
</Form>
<div align="center" >Invalid username/usertype or password</div>
</body>

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
