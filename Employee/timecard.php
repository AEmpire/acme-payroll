<?php
require_once 'ClsTimeCard.php';
require_once '../ClsCalDates.php';
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/7
 * Time: 18:16
 */
session_start();

$cookieOk = 0;

$clsTimeCard = new ruanjian\ClsTimeCard($_COOKIE,$_GET);

$clsTimeCard->processPageData();

$projectData=$clsTimeCard->getProjectData();
$timeCard=$clsTimeCard->getTimeCardData();

$clsTimeCard->resetCookie();
?>
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
<p>
    <a href="employeemenu.php">Return to Main Menu</a>
</p>
<h1 align="center">Time Card</h1>
<TABLE border='1' width='100%'>
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
</TABLE>
</body>
