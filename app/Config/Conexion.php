<?php

namespace App\Config;

class Conexion {

    private $host = "mysql:host=localhost;port=3306;dbname=chicha;charset=utf8";
    private $user = "root";
    private $password = "secret";

    public function getHost(){
        return $this->host;
    }

    public function getUser(){
        return $this->user;
    }

    public function getPassword(){
        return $this->password;
    }

}