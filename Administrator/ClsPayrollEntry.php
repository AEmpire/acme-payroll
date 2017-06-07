<?php


namespace ruanjian;
require_once '../Factory/ClsCookieFactory.php';
require_once '../ClsDataLayer.php';


class ClsPayrollEntry extends ClsCookieFactory
{
    private $weekSelected;
    private $yearSelected;
    private $payrollData;
    private $dataLayer;

    /**
     * this function is the driver of the business logic processing for
     * the page
     */
    function processPageData() {

        $this->dataLayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {

            $this->weeks = $this->getWeeks();
            $this->years = $this->getYears();

            $this->processPostData();

            $this->payrollData = $this->dataLayer->getPayrollData($this->weekSelected, $this->yearSelected);

        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }

    }


    function getPayrollData() {
        return $this->payrollData;
    }


    function getWeekSelected() {
        return $this->weekSelected;
    }

    /**
     * @return mixed
     */
    function getYearSelected() {
        return $this->yearSelected;
    }

    private function processPostData() {

        if (isset($this->postDataArray['week']) && isset($this->postDataArray['year']))
        {

            $this->weekSelected = $this->cleanse_input($this->postDataArray['week']);
            $this->yearSelected = $this->cleanse_input($this->postDataArray['year']);
        }
        else
        {
            $this->weekSelected = $this->weeks[0];
            $this->yearSelected = $this->years[0];

        }

        if (isset($this->postDataArray['updateenabled'])){
            if ($this->cleanse_input($this->postDataArray['updateenabled']) == "true") {
                $this->processInsertUpdatePayrollData();
            }
        }

    }


    private function processInsertUpdatePayrollData() {

        foreach ($this->postDataArray as $postField => $postValue) {

            $fieldSplit = explode("_",$postField);

            if ($fieldSplit[0] == "hoursworked") {
                $postValue = $this->cleanse_input($postValue);
                $employeeId = $fieldSplit[1];

                $updateFlag = 0;
                $updateFlag = $this->dataLayer->checkForPayrollData($this->weekSelected, $this->yearSelected,
                                                                     $employeeId);

                $this->dataLayer->insertUpdatePayrollData($updateFlag,$this->weekSelected, $this->yearSelected,
                                                          $employeeId,$postValue);
            }

        }
    }
}