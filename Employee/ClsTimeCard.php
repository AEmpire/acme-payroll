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

    function processPageData() {

        $this->clsDataLayer=new ClsDataLayer();

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {

            $this->weeks = $this->getWeeks();
            $this->years = $this->getYears();

        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }

}