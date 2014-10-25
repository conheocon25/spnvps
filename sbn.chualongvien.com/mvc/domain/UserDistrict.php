<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );
class UserDistrict extends Object{

    private $Id;
	private $IdUser;
	private $IdDistrict;
    				
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( 
		$Id=null, 
		$IdUser=null,
		$IdDistrict=null 		
	) {
        $this->Id 			= $Id;
		$this->IdUser 		= $IdUser;
		$this->IdDistrict 	= $IdDistrict;
				
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
			
	function setIdUser( $IdUser ) {$this->IdUser = $IdUser;$this->markDirty();}
	function getIdUser(){return $this->IdUser;}
	
    function setIdDistrict( $IdDistrict ) {$this->IdDistrict = $IdDistrict;$this->markDirty();}
    function getIdDistrict( ) {return $this->IdDistrict;}
	

	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdUser'		=> $this->getIdUser(),
			'IdDistrict'	=> $this->getIdDistrict()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
        $this->Id 			= $Data[0];
		$this->IdUser 		= $Data[1];
		$this->IdDistrict	= $Data[2];
    }
			
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>