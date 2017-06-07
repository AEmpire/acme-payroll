<?php
namespace ruanjian;
require_once 'Factory/ClsCookieFactory.php';
require_once 'ClsDataLayer.php';

class ClsLogin extends ClsCookieFactory
{
    private $username;
    private $password;
    private $usertype;
    private $dataLayer;

    function __construct($usn,$psw,$type){
        $this->username=$this->cleanse_input($usn);
        $this->password=$this->cleanse_input($psw);
        $this->usertype=$this->cleanse_input($type);
        $this->dataLayer=new ClsDataLayer();
    }

    function checkLogin(){
        $authOK=$this->dataLayer->checkLogin($this->username,$this->password,$this->usertype);
        if ($authOK!=false){
            $this->setCookie();
        }
        return $this->dataLayer->checkLogin($this->username,$this->password,$this->usertype);
    }

}