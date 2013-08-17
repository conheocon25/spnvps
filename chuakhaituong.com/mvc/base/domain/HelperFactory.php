<?php
namespace MVC\Domain;
if ( ! isset( $EG_DISABLE_INCLUDES ) ) {
	require_once( "mvc/mapper/App.php" );
	require_once( "mvc/mapper/User.php" );
	require_once( "mvc/mapper/CategoryTask.php" );
	require_once( "mvc/mapper/CategoryNews.php" );
	require_once( "mvc/mapper/CategoryVideo.php" );
	require_once( "mvc/mapper/CategoryAsk.php" );
	require_once( "mvc/mapper/CategoryBType.php" );
	require_once( "mvc/mapper/CategoryPaid.php" );
	require_once( "mvc/mapper/News.php" );
	require_once( "mvc/mapper/Video.php" );
	require_once( "mvc/mapper/VideoMonk.php" );
	require_once( "mvc/mapper/VideoPagoda.php" );
	require_once( "mvc/mapper/VideoSponsor.php" );
	require_once( "mvc/mapper/VideoLibrary.php" );
	require_once( "mvc/mapper/Album.php" );
	require_once( "mvc/mapper/Monk.php" );
	require_once( "mvc/mapper/Event.php" );
	require_once( "mvc/mapper/Pagoda.php" );
	require_once( "mvc/mapper/Ask.php" );
	require_once( "mvc/mapper/Guest.php");
	require_once( "mvc/mapper/Course.php");
	require_once( "mvc/mapper/CourseLession.php");
	require_once( "mvc/mapper/Config.php");
	require_once( "mvc/mapper/Sponsor.php");
	require_once( "mvc/mapper/SponsorPerson.php");
	require_once( "mvc/mapper/SponsorPaid.php");
	require_once( "mvc/mapper/PanelAds.php");
	require_once( "mvc/mapper/PanelNews.php");
	require_once( "mvc/mapper/PanelCategoryVideo.php");
	require_once( "mvc/mapper/PanelCategoryVideoDetail.php");
	require_once( "mvc/mapper/Task.php");
	require_once( "mvc/mapper/Paid.php");
	require_once( "mvc/mapper/Tracking.php");
	require_once( "mvc/mapper/Popup.php");
	require_once( "mvc/mapper/ProfileNews.php");
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
}
?>