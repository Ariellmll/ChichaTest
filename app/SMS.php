<?php

namespace App;


class SMS extends Mobile
{
	function __construct(string $phoneNumber, $message, $operator)
	{
		$this->phoneNumber = $phoneNumber;
		$this->message = $message;
		$this->operator = $operator;
	}
}