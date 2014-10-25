<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );
class UserProvince extends Object{

    private $Id;
	private $IdUser;
	private $IdProvince;
    				
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( 
		$Id=null, 
		$IdUser=null,
		$IdProvince=null 		
	) {
        $this->Id 			= $Id;
		$this->IdUser 		= $IdUser;
		$this->IdProvince 	= $IdProvince;
				
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
			
	function setIdUser( $IdUser ) {$this->IdUser = $IdUser;$this->markDirty();}
	function getIdUser(){return $this->IdUser;}
	
    function setIdProvince( $IdProvince ) {$this->IdProvince = $IdProvince;$this->markDirty();}
    function getIdProvince( ) {return $this->IdProvince;}
	

	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdUser'		=> $this->getIdUser(),
			'IdProvince'	=> $this->getIdProvince()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 			= $Data[0];
		$this->IdUser 		= $Data[1];
		$this->IdProvince	= $Data[2];
    }
			
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>