<?php

namespace Tests;

use App\Call;
use App\Contact;
use App\Mobile;
use App\Services\ContactService;
use App\SMS;
use \Mockery;
use PHPUnit\Framework\TestCase;

class MobileTest extends TestCase
{
    protected Call $call;
    protected SMS $sms;
    protected Contact $contact;
    protected string $phoneNumber;
    protected string $message;

    protected function setUp(): void
    {
        $this->phoneNumber = "+51998411813";
        $this->message = "this is a test message";
        $this->call = new Call($this->phoneNumber, 60, 'Movistar');
        $this->sms = new SMS($this->phoneNumber, $this->message, "Movistar");
        $this->contact = new Contact("Ariel Cornejo Otero", $this->phoneNumber, "Movistar");
    }

	/** @test 
	*/
	public function it_returns_null_when_name_empty()
	{
        $mobile = new Mobile(new ContactService());
		$this->assertNull($mobile->makeCallByName(''));
	}

	/** @test 
	*/
	public function a_call_is_made_by_name()
	{
        $mobile = new Mobile($this->getMock($this->contact, "findByName"));
		$this->assertEquals($mobile->makeCallByName('Ariel'), $this->call);
	}

	/** @test 
	*/
	public function a_contact_was_not_found()
	{
        $mobile = new Mobile($this->getMock(null, "findByName"));
		$this->expectExceptionMessage("There's no contact");
		$this->assertEquals($mobile->makeCallByName('Robert'), $this->call);
	}

	/** @test 
	*/
	public function send_message_to_a_contact()
	{
		$service = $this->getMock(true, "validateNumber");
		$service->shouldReceive("findByPhoneNumber")
                ->once()
				->andReturn($this->contact);
        $mobile = new Mobile($service);

		$this->assertEquals($mobile->SendMessageByPhoneNumber($this->phoneNumber, $this->message), $this->sms);
	}

	/** @test 
	*/
	public function phone_number_is_not_valid()
	{
		$service = $this->getMock(false, "validateNumber");
		$service->shouldReceive("findByPhoneNumber")
                ->once()
				->andReturn(null);
        $mobile = new Mobile($service);

		$this->expectExceptionMessage("PhoneNumber is not valid");
		$this->expectExceptionMessage("There's no contact");

		$this->assertEquals($mobile->SendMessageByPhoneNumber($this->phoneNumber, $this->message), $this->sms);
	}


	private function getMock($contact, $method):ContactService{
		$service = Mockery::mock(ContactService::class);
        $service->shouldReceive($method)
            ->once()
            ->andReturn($contact);

		return $service;	
	}


}
