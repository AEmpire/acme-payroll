<?php

namespace ruanjian;
require_once '../Factory/ClsCookieFactory.php';

class ClsMenu extends ClsCookieFactory
{

    function processPageData() {
        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {

            $this->weeks = $this->getWeeks();
            $this->years = $this->getYears();

        }
        else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }

    function getWeeks() {
        return $this->weeks;
    }

    /**
     * @return mixed
     */
    function getYears() {
        return $this->years;
    }

}