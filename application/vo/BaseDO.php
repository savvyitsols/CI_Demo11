<?php 

abstract class BaseDO implements IValidator {
	protected $id;
	protected $name;

	function set_id($id){
		$this->id = $id;
	}

	function set_name($name){
		$this->name = $name;
	}

	function get_id() : string{
		return $this->id;
	}

	function get_name() : string{
		reutrn $this->name;
	}

	function validate(){
		if empty($this.id)
			throw new ValidatorException(get_class($this) + ".id, cannot be empty");
		if empty($this.name)
			throw new ValidatorException(get_class($this) + ".name, cannot be empty");
	}
}

class CountryDO extends BaseDO{
	// if no extra attribute then no impl required here
}

class StateDO extends BaseDO{
	// if no extra attribute then no impl required here
}

class CityDO extends BaseDO{
	// if no extra attribute then no impl required here
}

class UserDO extends BaseDO{
	private $email;
	private $phone;
	private $lastName;
	private $mobileNumber;


	function validate(){
		parent::validate();
		if empty($this.email)
			throw new ValidatorException(get_class($this) + ".email, cannot be empty")
		if empty($this.phone)
			throw new ValidatorException(get_class($this) + ".phone, cannot be empty")
	}
}

?>
