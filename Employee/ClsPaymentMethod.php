<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/11
 * Time: 12:02
 */

namespace ruanjian;
require_once '../Factory/ClsCookieFactory.php';
require_once '../ClsDataLayer.php';

class ClsPaymentMethod extends ClsCookieFactory
{
    private $clsDatalayer;

    function processPageData() {

        $this->clsDatalayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {
            if (isset($this->postDataArray['bank'])){
                $this->clsDatalayer->editPaymentMethod($_SESSION['id'],$this->postDataArray['payment']);
                $this->clsDatalayer->editBank($this->postDataArray['bank'],$this->postDataArray['num'],$_SESSION['id']);
            }
            elseif (isset($this->postDataArray['mail'])){
                $this->clsDatalayer->editPaymentMethod($_SESSION['id'],$this->postDataArray['payment']);
                $this->clsDatalayer->editMail($_SESSION['id'],$this->postDataArray['mail']);
            }
        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }
}