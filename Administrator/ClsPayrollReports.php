<?php

namespace ruanjian;
require_once '../Factory/ClsCookieFactory.php';
require_once '../ClsDataLayer.php';


class ClsPayrollReports extends ClsCookieFactory
{
    private $clsDataLayer;

    private $timeCardData;

    private $employeePayrollData;

    private $purchaseOrderData;

    function processPageData() {

        $this->clsDataLayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        $id=$this->postDataArray['id'];
        $type=$this->clsDataLayer->getEmployee($id)[0]['employee_type'];
        if ($this->cookieOk == 1) {

            $this->timeCardData=$this->clsDataLayer->getTimeCard($id);

            $this->employeePayrollData=$this->clsDataLayer->getEmployeePayrollData($id,$type);

            $this->purchaseOrderData=$this->clsDataLayer->getPurchaseOrder($id);
        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }

    function getTotalHours(){

        $firstdate=$this->postDataArray['firstdate'];

        if ($this->postDataArray['lastdate']>date('Y/m/d')){
            $lastdate=date('Y/m/d');
        }
        else{
            $lastdate=$this->postDataArray['lastdate'];
        }

        $totalHours=0;

        foreach ($this->timeCardData as $cardDatum){
            if ($cardDatum['date']>=$firstdate&&$cardDatum['date']<=$lastdate){
                $totalHours+=$cardDatum['time_worked'];
            }

        }
        return $totalHours;
    }


    function getPayrollData(){
        $totalPayroll=0;
        $firstdate=$this->postDataArray['firstdate'];

        if ($this->postDataArray['lastdate']>date('Y/m/d')){
            $lastdate=date('Y/m/d');
        }
        else{
            $lastdate=$this->postDataArray['lastdate'];
        }

        $id=$this->postDataArray['id'];
        $type=$this->clsDataLayer->getEmployee($id)[0]['employee_type'];

        if ($type=='hourly'){
            $hourlimit=$this->employeePayrollData[0]['hour_limit'];
            $hourlywage=$this->employeePayrollData[0]['hourly_wage'];
            $tax=$this->employeePayrollData[0]['standard_tax_deductions'];
            foreach ($this->timeCardData as $cardDatum){
                if ($cardDatum['date']>=$firstdate&&$cardDatum['date']<=$lastdate){
                    if ($cardDatum['time_worked']>$hourlimit){
                        $payroll=($hourlimit*$hourlywage+($cardDatum['time_worked']-$hourlimit)*$hourlywage)*(1-$tax);
                        $totalPayroll+=$payroll;
                    }
                    else{
                        $payroll=$cardDatum['time_worked']*$hourlywage*(1-$tax);
                        $totalPayroll+=$payroll;
                    }
                }
            }
            return $totalPayroll;
        }
        elseif ($type=='commision'){
            $tax=$this->employeePayrollData[0]['standard_tax_deductions'];
            $commision=$this->employeePayrollData[0]['commission_rate'];
            $salary=$this->employeePayrollData[0]['salary'];
            $totalSales=$this->getTotalSale();
            $mouth=date('n', strtotime($lastdate))-date('n', strtotime($firstdate));

            $totalPayroll=($mouth*$salary+$totalSales*$commision)*(1-$tax);

            return $totalPayroll;
        }
        else{
            $tax=$this->employeePayrollData[0]['standard_tax_deductions'];
            $salary=$this->employeePayrollData[0]['salary'];
            $mouth=date('n', strtotime($lastdate))-date('n', strtotime($firstdate));

            $totalPayroll=$mouth*$salary*(1-$tax);

            return $totalPayroll;
        }
    }

    private function getTotalSale(){
        $firstdate=$this->postDataArray['firstdate'];

        if ($this->postDataArray['lastdate']>date('Y/m/d')){
            $lastdate=date('Y/m/d');
        }
        else{
            $lastdate=$this->postDataArray['lastdate'];
        }

        $totalSales=0;
        foreach ($this->purchaseOrderData as $purchaseOrderDatum){
            if ($purchaseOrderDatum['date']>=$firstdate&&$purchaseOrderDatum['date']<=$lastdate){
                $totalSales+=$purchaseOrderDatum['amount_of_money'];
            }
        }

        return $totalSales;
    }
}