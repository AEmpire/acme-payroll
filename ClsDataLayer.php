<?php

namespace ruanjian;
use PDO;
require_once "ClsCalDates.php";

class ClsDataLayer
{
    private $inDBH;

    function __construct() {
        $this->dbConnect();
    }

    private function dbConnect() {

        if ($this->inDBH === null) {
            try {

                $this->inDBH = new PDO('mysql:host=localhost;dbname=payroll_system', 'root', '');

                $this->inDBH->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
                $this->inDBH->setAttribute(PDO::ATTR_AUTOCOMMIT, true);

            } catch (\PDOException $e) {
                print "Fatal Error!: Database Connection Unavailable" . "<br/>";
                die();
            }
        }
    }

    function addEditEmployee($inEmployeeId, $inFirstName, $inLastName, $inHourlyWage, $inExemptStatus,$inEmployeeType,$tax,$inSalary,$inCommisionRate) {

        $this->dbConnect();

        if ($inEmployeeId == 0) {

            $inputSql = "Insert Into Employees (employee_first_name, employee_last_name, hourly_wage, exempt_flag,employee_type,standard_tax_deductions,salary,commission_rate)  VALUES (?, ?, ?, ?,?,?,?,?);";

            $sth = $this->inDBH->prepare($inputSql);
            $sth->execute(Array($inFirstName, $inLastName, $inHourlyWage, $inExemptStatus,$inEmployeeType,$tax,$inSalary,$inCommisionRate));
        }

        else {
            $inputSql = "Update Employees set employee_first_name = ?, employee_last_name = ?, hourly_wage = ?, exempt_flag = ? ,employee_type=?,standard_tax_deductions=?,salary=?,commission_rate=? Where employee_id = ?";

            $sth = $this->inDBH->prepare($inputSql);
            $sth->execute(Array($inFirstName, $inLastName, $inHourlyWage, $inExemptStatus,$inEmployeeType,$tax ,$inSalary,$inCommisionRate,$inEmployeeId));

        }

    }

    function getEmployees(){

        $this->dbConnect();

        $inputSql = "select employee_id,employee_first_name, employee_last_name, hourly_wage, exempt_flag ,employee_type,standard_tax_deductions,salary,commission_rate from Employees
	                order by employee_id";

        $sth = $this->inDBH->prepare($inputSql);
        $sth->execute();

        $result = $sth->fetchAll();

        return $result;
    }

    function getEmployee($id){
        $inputSql="select employee_first_name, employee_last_name, hourly_wage, exempt_flag ,employee_type,standard_tax_deductions from Employees WHERE employee_id=$id";
        $sth=$this->inDBH->prepare($inputSql);
        $sth->execute();
        return $sth->fetchAll();
    }

    function deleteEmployees($rowid){
        $this->dbConnect();
        $inputSql="delete from employees WHERE employee_id = $rowid";
        $sth=$this->inDBH->prepare($inputSql);
        $sth->execute();
        $inputSql="delete from timecard WHERE employee_id = $rowid";
        $sth=$this->inDBH->prepare($inputSql);
        $sth->execute();
        $inputSql="delete from purchase_order WHERE employee_id = $rowid";
        $sth=$this->inDBH->prepare($inputSql);
        $sth->execute();
    }

    function checkLogin($login_name, $login_pwd,$login_type) {

        $this->dbConnect();
        if ($login_type=='admin'){
            $inputSql = 'SELECT 1  FROM Users where user_name = ? and user_pwd = ?';

            $sth = $this->inDBH->prepare($inputSql);

            $sth->execute(Array($login_name,$login_pwd));

            $login_check = $sth->fetchColumn();

            return $login_check;
        }
       else{
           $inputSql = 'SELECT employee_type  FROM employees where employee_id = ? and pwd = ?';

           $sth = $this->inDBH->prepare($inputSql);

           $sth->execute(Array($login_name,$login_pwd));

           $login_check = $sth->fetchColumn();

           return $login_check;
       }
    }

    function getEmployeePayrollData($id,$type){
        $this->dbConnect();

        if ($type=='hourly'){
            $inputSql="select hour_limit,hourly_wage,standard_tax_deductions,exempt_flag from employees WHERE employee_id=?";

            $sth = $this->inDBH->prepare($inputSql);

            if ($sth->execute(Array($id))){
                $EmployeePayroll=$sth->fetchAll();
            }
            else{
                $EmployeePayroll=null;
            }
            return $EmployeePayroll;
        }
        elseif ($type='commision'){
            $inputSql="select commission_rate,salary,standard_tax_deductions from employees WHERE employee_id=?";

            $sth = $this->inDBH->prepare($inputSql);

            if ($sth->execute(Array($id))){
                $EmployeePayroll=$sth->fetchAll();
            }
            else{
                $EmployeePayroll=null;
            }
            return $EmployeePayroll;
        }
        else{
            $inputSql="select salary,standard_tax_deductions from employees WHERE employee_id=?";

            $sth = $this->inDBH->prepare($inputSql);

            if ($sth->execute(Array($id))){
                $EmployeePayroll=$sth->fetchAll();
            }
            else{
                $EmployeePayroll=null;
            }
            return $EmployeePayroll;
        }
    }

    function checkForPayrollData($inWeek, $inYear, $inEmployeeId) {

        $this->dbConnect();

        $inputSql = "select 1 from PayrollData
	                        where employee_id = ? and week_number = ? and year = ?";

        $sth = $this->inDBH->prepare($inputSql);

        $sth->execute(Array($inEmployeeId,$inWeek,$inYear));

        $result = $sth->fetchColumn();

        return $result;

    }

    function insertUpdatePayrollData($updateFlag, $week, $year, $employeeId, $hoursWorked) {

        $this->dbConnect();

        if ($updateFlag == 0) {
            $inputSql = "insert into PayrollData (hours_worked, employee_id, week_number, year)
	                            values (?,?,?,?)";
        }
        else if ($updateFlag == 1) {
            $inputSql = "update PayrollData set hours_worked = ?
	                              where employee_id = ? and week_number = ? and year = ?";
        }

        $sth = $this->inDBH->prepare($inputSql);

        $sth->execute(Array($hoursWorked,$employeeId, $week,$year));


    }

    function getPurchaseOrder($inEmployeeId){
        $inputSql="select id,amount_of_money, date, employee_id,name,status from purchase_order WHERE employee_id=$inEmployeeId ORDER BY id";
        $sth=$this->inDBH->prepare($inputSql);
        $sth->execute();
        return $sth->fetchAll();
    }

    function deletePurchaseOrder($rowid){
        $this->dbConnect();
        $inputSql="delete from purchase_order WHERE id = $rowid";
        $sth=$this->inDBH->prepare($inputSql);
        $sth->execute();
    }

    function addEditPurchaseOrder($inOrderId,$inMoney,$inDate,$inEmployeeId,$inStatus,$name){
        $this->dbConnect();

        if ($inOrderId == 0) {

            $inputSql = "Insert Into purchase_order (amount_of_money, date, employee_id,name,status) 
	                VALUES (?, ?, ?, ?,?);";

            $sth = $this->inDBH->prepare($inputSql);
            $sth->execute(Array($inMoney,$inDate,$inEmployeeId,$name,$inStatus));
        }

        else {
            $inputSql = "Update purchase_order set amount_of_money = ?, date = ?,employee_id=?, status=?,name=?
	                Where id = ?";

            $sth = $this->inDBH->prepare($inputSql);
            $sth->execute(Array($inMoney,$inDate,$inEmployeeId,$inStatus,$name,$inOrderId));

        }
    }

    function getProject(){
        $this->dbConnect();

        $inputSql="select charge_num,project from project_management_database";

        $sth=$this->inDBH->prepare($inputSql);

        $sth->execute();

        return $sth->fetchAll();
    }

    function getTimeCard($employeeId){
        $this->dbConnect();

        $inputSql="select time_worked,status,charge_num,date from timecard WHERE employee_id=$employeeId ORDER BY date DESC";

        $sth=$this->inDBH->prepare($inputSql);

        $sth->execute();

        return $sth->fetchAll();
    }

    function submitTimeCard($charge_num,$time_worked,$employeeId,$employeeType){
        $this->dbConnect();

        if ($employeeType=='commision'){
            $inputSql="Update timecard set  time_worked = ?,status='submitted' Where employee_id = ? and date=?";

            $sth=$this->inDBH->prepare($inputSql);

            $sth->execute(Array($time_worked,$employeeId,date('Y-m-d')));
        }
        else{
            $inputSql="Update timecard set charge_num = ?, time_worked = ?,status='submitted' Where employee_id = ? and date=?";

            $sth=$this->inDBH->prepare($inputSql);

            $sth->execute(Array($charge_num,$time_worked,$employeeId,date('Y-m-d')));
        }

    }

    function createTimeCard($employeeId,$employeeType,$date){
        $this->dbConnect();
        $inputSql="insert into timecard (date,employee_id) VALUE (?,?)";
        $sth=$this->inDBH->prepare($inputSql);
        if ($employeeType=='hourly'){
            for ($i=0;date('D',strtotime($date))!='Sat';$i++){
                $sth->execute(Array($date++,$employeeId));
            }
        }
        else{
            for ($i=0;$i<(date('t')-date('j')+1);$i++){
                $sth->execute(Array($date++,$employeeId));
            }
        }
    }

    function editPaymentMethod($id,$method){
        $this->dbConnect();

        $inputSql="Update employees set payment_method=? Where employee_id = ?";

        $sth=$this->inDBH->prepare($inputSql);

        $sth->execute(Array($method,$id));
    }

    function editMail($id,$mail){
        $this->dbConnect();

        $inputSql="Update employees set mail_address=? Where employee_id = ?";

        $sth=$this->inDBH->prepare($inputSql);

        $sth->execute(Array($mail,$id));
    }

    function editBank($name,$num,$id){
        $this->dbConnect();

        $inputSql="Update employees set bank_name=?,account_num=? Where employee_id = ?";

        $sth=$this->inDBH->prepare($inputSql);

        $sth->execute(Array($name,$num,$id));
    }
}