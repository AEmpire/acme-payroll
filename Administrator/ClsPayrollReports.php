<?php

namespace ruanjian;
require_once '../Factory/ClsCookieFactory.php';
require_once '../ClsDataLayer.php';


class ClsPayrollReports extends ClsCookieFactory
{
    private $weekSelected;
    private $yearSelected;
    private $payrollDataCalculated;
    private $dataLayer;

    /**
     * this function drives the business logic processing for the payroll reports page
     */
    function processPageData() {

        $this->dataLayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {

            $this->weeks = $this->getWeeks();
            $this->years = $this->getYears();

            $this->processPostData();

            $this->payrollDataCalculated = $this->generatePayrollDataCalculated();

        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }

    }

    function getPayrollDataCalculated() {
        return $this->payrollDataCalculated;
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

    // end getters

    /**
     * function that processes the data from the post array
     */
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
    }

    private function generatePayrollDataCalculated() {

        $employeeCount = 0;
        $totalHoursWorked = 0.0;
        $totalBasePay = 0.0;
        $totalOvertimePay = 0.0;
        $totalGrossPay = 0.0;

        $payrollData = $this->dataLayer->getPayrollData($this->weekSelected, $this->yearSelected);

        $payrollDataCalculated= [];

        $index = 0;

        foreach ($payrollData as $payrolldatum) {

            $hoursWorked = $payrolldatum[3];
            $hourlyWage = $payrolldatum[4];
            $exemptFlag = $payrolldatum[5] == 0 ? 'N' : 'Y';

            $weeklyPay = $this->calculateWeeklyPay($hoursWorked, $hourlyWage, $exemptFlag);

            $payrollDataCalculated[$index] = array_merge($payrolldatum,$weeklyPay);

            $employeeCount += 1;
            $totalHoursWorked += $hoursWorked;
            $totalBasePay += $weeklyPay[0];
            $totalOvertimePay += $weeklyPay[1];
            $totalGrossPay += $weeklyPay[2];

            $index++;
        }

        $totalPayrollData = ["","TOTALS","",$totalHoursWorked,"","",$totalBasePay,$totalOvertimePay,$totalGrossPay];

        $averagePayrollData = ["", "AVERAGES", "", $totalHoursWorked/$employeeCount, "", "",
            $totalBasePay/$employeeCount,
            $totalOvertimePay/$employeeCount,
            $totalGrossPay/$employeeCount];

        array_push($payrollDataCalculated,$totalPayrollData, $averagePayrollData);

        return $payrollDataCalculated;
    }

    /**
     * function that contains the business logic for calculating weekly pay
     * based on hours/wage/exempt status
     * @param $hoursWorked
     * @param $hourlyWage
     * @param $exemptFlag
     * @return array
     */
    private function calculateWeeklyPay($hoursWorked, $hourlyWage, $exemptFlag) {

    $baseHours = 40.0;
    $otMultiplier = 1.5;

    $basePay = round(($hoursWorked > 40 ? $baseHours : $hoursWorked) * $hourlyWage, 2);

    $overtimePay = 0.0;

    if ($exemptFlag == 'N' and $hoursWorked > 40) {

        $overtimePay = round(($hoursWorked - $baseHours) * ($hourlyWage * $otMultiplier), 2);

    }

    $grossPay = ($basePay) + ($overtimePay);

    $weekPay = [$basePay,$overtimePay,$grossPay];

    return $weekPay;

    }
}