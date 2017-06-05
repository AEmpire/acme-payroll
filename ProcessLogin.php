<?php
require_once 'ClsDataLayer.php';
require_once 'ClsUtility.php';

$dataLayer = new ruanjian\ClsDataLayer();
$utility = new ruanjian\ClsUtility();
$authOK = false;
if (isset($_GET['username']) && isset($_GET['password']))
{

    $username = $utility->cleanse_input($_GET['username']);
    $password = $utility->cleanse_input($_GET['password']);
    $authOK=$dataLayer->checkLogin($username,$password);
    if ($authOK !=false) {
        $utility->setCookie();
    }
}

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
<?php else: ?>
    <html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1; url=./default.php">
        <script type="text/javascript">
            window.location.href = "Administrator/default.php"
        </script>
        <title>Page Redirection</title>
    </head>
    <body>

    If you are not redirected automatically, follow this <a href='Administrator/default.php'</a>.
        </body>
    </html>
    <?php endif; ?>
