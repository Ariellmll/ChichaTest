<?php 

namespace App\Services;

use App\Config\Twillio;
use App\SMS;
use Twilio\Rest\Client;

class TwillioService {

    private Client $client;
    private Twillio $twillio;

    function __construct()
    {
        $this->twillio = new Twillio();
        $this->client = new Client((string) $this->twillio->getAccountId(),(string) $this->twillio->getAuthToken());
    }


    public function sendMessage(SMS $sms, $message):SMS{
        $this->client->messages->create(
            (string) $sms->getPhoneNumber(),
            array(
                'from' => $this->twillio->getTwillioPhoneNumber(),
                'body' => $message
            )
        );

        return $sms;
    }

}