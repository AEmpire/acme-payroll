<?php

namespace ruanjian;
require_once '../ClsDataLayer.php';
require_once '../Factory/ClsCookieFactory.php';

class ClsMenu extends ClsCookieFactory
{
    private $employeeData;
    private $dataLayer;

    function processPageData() {

        $this->dataLayer=new ClsDataLayer();
        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {
            $this->employeeData = $this->dataLayer->getEmployees();
        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }

    }

    function getEmployees(){
        return $this->employeeData;
    }


}