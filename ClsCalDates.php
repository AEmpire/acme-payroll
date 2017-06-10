<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/9
 * Time: 16:00
 */

namespace ruanjian;


class ClsCalDates
{
    static function getMonthDay($date)
    {
        $firstday = date('Y-m-01', strtotime($date));
        $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
        return $lastday - $date;
    }
}