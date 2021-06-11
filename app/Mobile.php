<?php

namespace App;

use App\Facades\PhoneActionFacade;
use App\Services\ContactService;
use Exception;

class Mobile
{
	protected string $phoneNumber;
	protected ?int $minutesInCall;
	protected ?string $message;
	protected string $operator;

	protected ContactService $contactService;
	
	function __construct(ContactService $contactService)
	{
		$this->contactService = $contactService;
	}


	public function makeCallByName($name = '')
	{
		if( empty($name) ) return;

		$contact = $this->contactService->findByName($name);
		if(!$contact) throw new Exception("There's no contact");

		return PhoneActionFacade::call($contact);
	}

	public function SendMessageByPhoneNumber(string $phoneNumber = null, string $message)
	{
		$validate = $this->contactService->validateNumber($phoneNumber);
		if(!$validate) throw new Exception("PhoneNumber is not valid");

		$contact = $this->contactService->findByPhoneNumber($phoneNumber);
		if(!$contact) throw new Exception("There's no contact");

		return PhoneActionFacade::sms($contact, $message);
	}

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return int|null
     */
    public function getMinutesInCall(): ?int
    {
        return $this->minutesInCall;
    }

    /**
     * @param int|null $minutesInCall
     */
    public function setMinutesInCall(?int $minutesInCall): void
    {
        $this->minutesInCall = $minutesInCall;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @param string $operator
     */
    public function setOperator(string $operator): void
    {
        $this->operator = $operator;
    }

}
