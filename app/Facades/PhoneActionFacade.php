<?php

namespace App\Facades;

use App\Call;
use App\Contact;
use App\Factories\MobileCarriesFactory;
use App\Interfaces\MobileFacadeInterface;
use App\SMS;

class PhoneActionFacade implements MobileFacadeInterface {

    public static function call(Contact $contact) : Call{
         $operator = MobileCarriesFactory::getMobileCarryService($contact);
         return $operator->makeCall();
    }

    public static function sms(Contact $contact, string $message): SMS{
        $operator = MobileCarriesFactory::getMobileCarryService($contact);
        return $operator->sendMessage($message);
   }

}
