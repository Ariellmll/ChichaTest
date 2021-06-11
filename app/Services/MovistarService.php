<?php

namespace App\Services;

use App\Contact;
use App\Call;
use App\Interfaces\CarrierInterface;
use App\SMS;

class MovistarService implements CarrierInterface
{

    protected Contact $contact;

    function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function dialContact(): Contact
    {
        return $this->contact;
    }

    public function makeCall(): Call
    {
        return new Call((string)$this->contact->getPhoneNumber(), 60, $this->contact->getMobileCarries());
    }

    public function sendMessage(string $message): SMS
    {
        $twillioService = new TwillioService();
        $sms = new SMS((string) $this->contact->getPhoneNumber(), $message, $this->contact->getMobileCarries());
        return $twillioService->sendMessage($sms, $message);
    }
}
