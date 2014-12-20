<?php
namespace MVC\Domain;
if ( ! isset( $EG_DISABLE_INCLUDES ) ) {	
	require_once( "mvc/mapper/Album.php" );
	require_once( "mvc/mapper/Anime.php" );
	require_once( "mvc/mapper/User.php" );			
	require_once( "mvc/mapper/Config.php");		
	require_once( "mvc/mapper/Guest.php");	
	require_once( "mvc/mapper/Feed.php");
	require_once( "mvc/mapper/CategoryNews.php");
	require_once( "mvc/mapper/CategoryDocument.php");
	require_once( "mvc/mapper/CategoryBType.php");
	require_once( "mvc/mapper/CategoryVideo.php");		
	require_once( "mvc/mapper/News.php");
	require_once( "mvc/mapper/Document.php");
		
	require_once( "mvc/mapper/Video.php");
	require_once( "mvc/mapper/VideoLibrary.php");
	require_once( "mvc/mapper/VideoDisable.php");
	require_once( "mvc/mapper/VideoMonk.php");
	require_once( "mvc/mapper/VoiceBook.php");
	
	require_once( "mvc/mapper/Province.php");
	require_once( "mvc/mapper/District.php");
	require_once( "mvc/mapper/Pagoda.php");	
	require_once( "mvc/mapper/Event.php");	
	require_once( "mvc/mapper/Monk.php");	
	require_once( "mvc/mapper/PPost.php");
	require_once( "mvc/mapper/PAlbum.php");
	require_once( "mvc/mapper/PVideo.php");
}

class HelperFactory {
    static function getFinder( $type ) {
        $type = preg_replace( "/^.*_/", "", $type );
        $mapper = "\\MVC\\Mapper\\{$type}";
        if ( class_exists( $mapper ) ) {
            return new $mapper();
        }
        throw new \MVC\Base\AppException( "Không biết: $mapper" );
    }

    static function getCollection( $type ) {
        $type = preg_replace( "/^.*_/", "", $type );
        $collection = "\\MVC\\Mapper\\{$type}Collection";
        if ( class_exists( $collection ) ) {
            return new $collection();
        }
        throw new \MVC\Base\AppException( "Không biết: $collection" );
    }
	
	static function getModel( $model ) {
        $model = preg_replace( "/^.*_/", "", $model );
        $model = "\\MVC\\Domain\\{$model}";
        if ( class_exists( $model ) ) {
            return new $model();
        }
        throw new \MVC\Base\AppException( "Không biết: $model" );
    }
	
}
?>
