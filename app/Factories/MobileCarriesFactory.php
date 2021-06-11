<?php

namespace App\Factories;

use App\Contact;
use App\Interfaces\CarrierInterface;
use App\Services\ClaroService;
use App\Services\MovistarService;

class MobileCarriesFactory{


    public static function getMobileCarryService(Contact $contact) : CarrierInterface {
        switch($contact->getMobileCarries()){
            case 'Movistar':
                return new MovistarService($contact);
                break;
            default:
                return new ClaroService($contact);
                break;            
        }
    }

}