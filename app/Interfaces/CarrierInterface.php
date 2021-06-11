<?php

namespace App\Interfaces;

use App\Call;
use App\Contact;
use App\Services\TwillioService;
use App\SMS;

interface CarrierInterface
{
	
	public function dialContact() : Contact;

	public function makeCall(): Call;

	public function sendMessage(string $message): SMS;
}