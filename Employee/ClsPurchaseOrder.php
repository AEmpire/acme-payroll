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

class ClsPurchaseOrder extends ClsCookieFactory
{
    private $clsDataLayer;
    private $purchaseOrderData;

    function processPageData() {

        $this->clsDataLayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {
            if ($this->postDataArray!=null) {
                $this->processPostData();
            }
            $this->purchaseOrderData=$this->clsDataLayer->getPurchaseOrder($_SESSION['id']);
        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }

    function getPurchaseOrderData($id){
        return $this->purchaseOrderData;
    }

    function deletePurchaseOrderData($rowid){
        $this->clsDataLayer->deletePurchaseOrder($rowid);
    }

    private function processPostData() {
        if ($this->postDataArray['submit']=='delete') {
            $this->deletePurchaseOrderData($this->postDataArray['rowid']);
        }
        elseif($this->postDataArray['submit']=='Submit') {
            if (isset($this->postDataArray['orderid'])) {
                $OrderId = $this->cleanse_input($this->postDataArray['orderid']);
                $Money=$this->cleanse_input($this->postDataArray['money']);
                $Date=$this->cleanse_input($this->postDataArray['date']);
                $Name=$this->cleanse_input($this->postDataArray['name']);
                if (isset($this->postDataArray['status'])) {
                    $Status = 0;
                } else {
                    $Status = 1;
                }

                $this->clsDataLayer->addEditPurchaseOrder($OrderId,$Money,$Date,$_SESSION['id'],$Status,$Name);
            }

        }
    }
}