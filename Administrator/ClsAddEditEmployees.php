<?php


namespace ruanjian;

require_once '../Factory/ClsCookieFactory.php';
require_once '../ClsDataLayer.php';

class ClsAddEditEmployees extends ClsCookieFactory
{
    private $employeeData;
    private $dataLayer;

    function processPageData() {

        $this->dataLayer=new ClsDataLayer();
        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {

            if ($this->postDataArray!=null) {
                $this->processPostData();
            }
            $this->employeeData = $this->dataLayer->getEmployees();
        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }

    }

    function getEmployeeData() {
        return $this->employeeData;
    }

    function deleteEmployeeData($rowid){
        $this->dataLayer->deleteEmployees($rowid);
    }

    private function processPostData() {
        if ($this->postDataArray['submit']=='delete') {
            $this->deleteEmployeeData($this->postDataArray['rowid']);
        }
        else {
            if (isset($this->postDataArray['employeeid'])) {

                $employeeId = $this->cleanse_input($this->postDataArray['employeeid']);
                $firstName = $this->cleanse_input($this->postDataArray['firstname']);
                $lastName = $this->cleanse_input($this->postDataArray['lastname']);
                $hourlyWage = $this->cleanse_input($this->postDataArray['hourlywage']);
                $employeeType = $this->cleanse_input($this->postDataArray['type']);
                $taxdeduction = $this->cleanse_input($this->postDataArray['taxdeduction']);
                if (isset($this->postDataArray['exempt'])) {
                    $exemptStatus = 1;
                } else {
                    $exemptStatus = 0;
                }

                $this->dataLayer->addEditEmployee($employeeId, $firstName, $lastName, $hourlyWage, $exemptStatus,$employeeType,$taxdeduction);
            }

        }
    }


}