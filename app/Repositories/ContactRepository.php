<?php

namespace App\Repositories;

use App\Database\DbProvider;
use PDOException;

class ContactRepository{

    private $db;

    public function __construct()
    {
        $this->db = DbProvider::get();
    }


    public function findByName($name){
		$result = null;
        try {
            $stm = $this->db->prepare('select * from contact where full_name LIKE :name LIMIT 1');
            $stm->execute(['name' => "%".$name."%"]);
            $result = $stm->fetchObject('\\App\\Contact');
        } catch (PDOException $ex) {
            var_dump($ex);
        }

        return $result;
    }

    public function findByPhoneNumber($phoneNumber){
		$result = null;
        try {
            $stm = $this->db->prepare('select * from contact where phone_number = :phone_number LIMIT 1');
            $stm->execute(['phone_number' => $phoneNumber]);
            $result = $stm->fetchObject('\\App\\Contact');
        } catch (PDOException $ex) {
            var_dump($ex);
        }

        return $result;
    }
    
}