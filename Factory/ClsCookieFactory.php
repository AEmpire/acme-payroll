<?php
namespace ruanjian;
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/7
 * Time: 19:15
 */

abstract class ClsCookieFactory
{
    protected $cookieOk;
    protected $cookieNotOkText = '<html lang="en-US">
            <head>
                <title>Invalid Username or Bad Passw</title>
            </head>
            <body>
    Invalid Username or Bad Password
    </body>
        </html>';

    private $cookieName = 'myAuthCookie';

    private $cookieValue = 'UserIsOk';

    private $cookieTimeOut = 3600;
    protected $postDataArray;
    private $cookieArray;
    protected $weeks;
    protected $years;

    /**
     * ClsLogin constructor.
     */
    function __construct($cookieArray, $postDataArray)
    {
        $this->cookieArray = $cookieArray;
        $this->postDataArray = $postDataArray;
        $this->weeks = range(1,52);
        $this->years = range(2016,2017);
    }

    function processPageData()
    {

        $this->cookieOk = $this->checkAuthCookie();

        if ($this->cookieOk == 1) {
        } else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
    }

    /**
     * this function will take the cookie array and validate the cookie
     * @param $cookieArray
     * @return int
     */
    protected function checkAuthCookie()
    {

        $this->cookieOk = 0;

        if (isset($this->cookieArray[$this->cookieName])) {
            if ($this->cookieArray[$this->cookieName] == $this->cookieValue) {
                $this->cookieOk = 1;
            }
        } else {
            $this->cookieNotOkText = $this->getCookieNotOkText();
        }
        return $this->cookieOk;
    }

    /**
     * this function sets the user cookie using the class field settings
     */
    protected function setCookie()
    {
        setcookie($this->cookieName, $this->cookieValue, time() + $this->cookieTimeOut);
    }

    /**
     * this function sets the user cookie using the class field settings
     */
    function deleteCookie()
    {
        setcookie($this->cookieName, '', time() - 3600);
    }


    /**
     * @return string
     */
    protected function getCookieNotOkText()
    {
        return $this->cookieNotOkText;
    }

    function resetCookie()
    {
        if ($this->cookieOk == 1) {
            $this->setCookie();
        }
    }
    protected function cleanse_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function getWeeks() {
        return $this->weeks;
    }
    /**
     * @return array
     */
    function getYears() {
        return $this->years;
    }

}