<?php
	namespace MVC\Base;
	class AppException extends \Exception
	{
	
	}	
	class DBException extends \Exception {
		private $error;
		function __construct( DB_Error $error ) {
			parent::__construct( $error->getMessage(), $error->getCode() ); 
			$this->error = $db_error;
		}
		function getErrorObject() {
			return $this->error;
		}
	}
?>