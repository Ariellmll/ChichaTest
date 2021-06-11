<?php

namespace App\Interfaces;

use App\Call;
use App\Contact;
use App\SMS;

interface MobileFacadeInterface
{
	
	public static function call(Contact $contact) : Call;
	public static function sms(Contact $contact, string $message) : SMS;
}