<?php

namespace App\Config;

class Twillio {

    private $account_id = "XXXXXXXXXXXXXXXXXXXXXX";
    private $auth_token = "XXXXXXXXXXXXXXXXXXXXX";
    private $twillioPhoneNumber = "XXXXXXXXXXX";

    public function getAccountId(){
        return $this->account_id;
    }

    public function getAuthToken(){
        return $this->auth_token;
    }

    public function getTwillioPhoneNumber()
    {
        return $this->twillioPhoneNumber;
    }

}