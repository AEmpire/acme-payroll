<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/7
 * Time: 18:38
 */

namespace ruanjian;
require_once '../Factory/ClsCookieFactory.php';
require_once '../ClsDataLayer.php';

class ClsTimeCard extends ClsCookieFactory
{
    private $clsDataLayer;

    private $timeCardData;

    private $projectData;

    function processPageData() {

        $this->clsDataLayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {
            if (isset($this->postDataArray['status'])){
                $timeworked=$this->cleanse_input($this->postDataArray['timeworked']);
                $charge_num=$this->cleanse_input($this->postDataArray['Charge_num']);
                $status=$this->cleanse_input($this->postDataArray['status']);
                $this->clsDataLayer->submitTimeCard($charge_num,$timeworked,$_SESSION['id'],$_SESSION['type']);
            }
            $this->projectData=$this->clsDataLayer->getProject();
            $this->timeCardData=$this->clsDataLayer->getTimeCard($_SESSION['id']);
            if (isset($this->timeCardData[0])) {
                if ($this->timeCardData[0]['status'] == 'submitted') {
                 if (date('D')=='Sat'||date('D')=='Sun'||date('D')=='Fri'){
                 }
                 else{
                     $this->clsDataLayer->createTimeCard($_SESSION['id'], $_SESSION['type'], date('Y-m-d'));
                     $this->timeCardData = $this->clsDataLayer->getTimeCard($_SESSION['id']);
                 }
                }
            }
            else{
                $this->clsDataLayer->createTimeCard($_SESSION['id'], $_SESSION['type'], date('Y-m-d'));
                $this->timeCardData = $this->clsDataLayer->getTimeCard($_SESSION['id']);
            }
        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }

    function getProjectData(){
        return $this->projectData;
    }

    function getTimeCardData(){
        if ($_SESSION['type']=='hourly'){
            return array_slice($this->timeCardData,0,5);
        }
        else{
            return array_slice($this->timeCardData,0,date('t'));
        }
    }

}