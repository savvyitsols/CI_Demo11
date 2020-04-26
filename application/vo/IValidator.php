<?php 

interface IValidator{
	function validate()	// Domin class would implement validation of respective objects, if across then should be implemented in Controller class to invoke respective Domain validate methods
}

class ValidatorException extends Exception { }

?>

