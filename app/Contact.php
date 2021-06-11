<?php

namespace App;


class Contact
{
	private $id;
	private string $full_name;
	private string $phone_number;
	private string $mobile_carries;

    /**
     * Contact constructor.
     * @param $full_name
     * @param $phone_number
     * @param $mobile_carries
     */
    public function __construct($full_name, $phone_number, $mobile_carries)
    {
        $this->full_name = $full_name;
        $this->phone_number = $phone_number;
        $this->mobile_carries = $mobile_carries;
    }


    public function setFullName($full_name){
		$this->full_name = $full_name;
	}

	public function getFullName(){
		return $this->full_name;
	}

	public function setPhoneNumber($phone_number):string{
		$this->phone_number = $phone_number;
	}

	public function getPhoneNumber():string{
		return $this->phone_number;
	}

	public function setMobileCarries($mobile_carries){
		$this->mobile_carries = $mobile_carries;
	}

	public function getMobileCarries(){
		return $this->mobile_carries;
	}
	
}