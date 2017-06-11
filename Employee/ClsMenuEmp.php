<?php

namespace ruanjian;
require_once '../Factory/ClsCookieFactory.php';
require_once '../ClsDataLayer.php';

class ClsMenuEmp extends ClsCookieFactory
{
    private $clsDataLayer;

    private $employeeData;

    /**
     * this function is the driver of the business logic processing for
     * the page
     */
    function processPageData() {

        $this->clsDataLayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {
            $this->employeeData=$this->clsDataLayer->getEmployee($_SESSION['id']);
        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }

    function getEmployeeData(){
        return $this->employeeData;
    }


}