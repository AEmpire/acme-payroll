<?php
/**
 * Created by PhpStorm.
 * User: clawrence
 * Date: 3/10/17
 * Time: 4:47 PM
 */
require_once 'ClsUtility.php';

$utility = new ruanjian\ClsUtility();

$utility->deleteCookie();
?>

    <html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1;url=./default.php">
        <script type="text/javascript">
            window.location.href = "./login.html"
        </script>
        <title>Page Redirection</title>
    </head>
    <body>

    If you are not redirected automatically, follow this <a href='./login.html'</a>.
        </body>
    </html>

