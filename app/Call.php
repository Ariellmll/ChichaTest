<?php

namespace App;


class Call extends Mobile
{
	function __construct(string $phoneNumber, $minutesInCall, $operator)
	{
		$this->phoneNumber = $phoneNumber;
		$this->minutesInCall = $minutesInCall;
		$this->operator = $operator;
	}

}