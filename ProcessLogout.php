<?php

require_once 'ClsLogout.php';

$utility = new ruanjian\ClsLogout($_COOKIE,$_GET);

$utility->deleteCookie();
?>

    <html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1;url=./default.php">
        <script type="text/javascript">
            window.location.href = "./index.html"
        </script>
        <title>Page Redirection</title>
    </head>
    <body>

    If you are not redirected automatically, follow this <a href='./index.html'></a>.
        </body>
    </html>

