<?php

namespace App\Services;

use App\Contact;
use App\Database\DbProvider;
use App\Repositories\ContactRepository;
use PDOException;

class ContactService
{
	
	protected ContactRepository $repository;

	function __construct()
	{
		$this->repository = new ContactRepository();
	}
	
	public function findByName($name)
	{
		// queries to the db
        return $this->repository->findByName($name);
	}

	public function findByPhoneNumber($name)
	{
		// queries to the db
        return $this->repository->findByPhoneNumber($name);
	}

	public static function validateNumber(string $number): bool
	{
		// logic to validate numbers
        $filtered_phone_number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
        $phone_to_check = str_replace("+", "", $filtered_phone_number);
		if( strlen($phone_to_check) < 11 ){
			return false;
		}
		return true;
	}
}