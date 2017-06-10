<?php
/**
 * Created by PhpStorm.
 * User: AEmpire
 * Date: 2017/6/7
 * Time: 18:36
 */

namespace ruanjian;
require_once '../Factory/ClsCookieFactory.php';
require_once '../ClsDataLayer.php';

class ClsEmployeeReport extends ClsCookieFactory
{

    private $clsDataLayer;

    private $timeCardData;

    private $employeePayrollData;

    function processPageData() {

        $this->clsDataLayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {

            $this->timeCardData=$this->clsDataLayer->getTimeCard($_SESSION['id']);

            $this->employeePayrollData=$this->clsDataLayer->getEmployeePayrollData($_SESSION['id'],$_SESSION['type']);

        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }

    function getTotalHours($firstdate,$lastdata){

    }




}