<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );
class UserPagoda extends Object{

    private $Id;
	private $IdUser;
	private $IdPagoda;
    				
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( 
		$Id=null, 
		$IdUser=null,
		$IdPagoda=null 		
	) {
        $this->Id 			= $Id;
		$this->IdUser 		= $IdUser;
		$this->IdPagoda 	= $IdPagoda;
				
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
			
	function setIdUser( $IdUser ) {$this->IdUser = $IdUser;$this->markDirty();}
	function getIdUser(){return $this->IdUser;}
	
    function setIdPagoda( $IdPagoda ) {$this->IdPagoda = $IdPagoda;$this->markDirty();}
    function getIdPagoda( ) {return $this->IdPagoda;}
	

	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdUser'		=> $this->getIdUser(),
			'IdPagoda'	=> $this->getIdPagoda()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 			= $Data[0];
		$this->IdUser 		= $Data[1];
		$this->IdPagoda	= $Data[2];
    }
			
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>