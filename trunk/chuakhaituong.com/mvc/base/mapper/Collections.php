<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class AppCollection extends Collection implements \MVC\Domain\AppCollection {function targetClass( ) {return "\MVC\Domain\App";}}
class UserCollection extends Collection implements \MVC\Domain\UserCollection {function targetClass( ) {return "\MVC\Domain\User";}}
class CategoryTaskCollection extends Collection implements \MVC\Domain\CategoryTaskCollection {function targetClass( ) {return "\MVC\Domain\CategoryTask";}}
class CategoryNewsCollection extends Collection implements \MVC\Domain\CategoryNewsCollection {function targetClass( ) {return "\MVC\Domain\CategoryNews";}}
class CategoryVideoCollection extends Collection implements \MVC\Domain\CategoryVideoCollection {function targetClass( ) {return "\MVC\Domain\CategoryVideo";}}
class CategoryAskCollection extends Collection implements \MVC\Domain\CategoryAskCollection {function targetClass( ) {return "\MVC\Domain\CategoryAsk";}}
class CategoryPaidCollection extends Collection implements \MVC\Domain\CategoryPaidCollection {function targetClass( ) {return "\MVC\Domain\CategoryPaid";}}
class CategoryBTypeCollection extends Collection implements \MVC\Domain\CategoryBTypeCollection {function targetClass( ) {return "\MVC\Domain\BType";}}
class PageCollection extends Collection implements \MVC\Domain\PageCollection {function targetClass( ) {return "\MVC\Domain\Page";}}
class NewsCollection extends Collection implements \MVC\Domain\NewsCollection {function targetClass( ) {return "\MVC\Domain\News";}}
class VideoCollection extends Collection implements \MVC\Domain\VideoCollection {function targetClass( ) {return "\MVC\Domain\Video";}}
class VideoMonkCollection extends Collection implements \MVC\Domain\VideoMonkCollection {function targetClass( ) {return "\MVC\Domain\VideoMonk";}}
class VideoPagodaCollection extends Collection implements \MVC\Domain\VideoPagodaCollection {function targetClass( ) {return "\MVC\Domain\VideoPagoda";}}
class VideoSponsorCollection extends Collection implements \MVC\Domain\VideoSponsorCollection {function targetClass( ) {return "\MVC\Domain\VideoSponsor";}}
class VideoLibraryCollection extends Collection implements \MVC\Domain\VideoLibraryCollection {function targetClass( ) {return "\MVC\Domain\VideoLibrary";}}
class AlbumCollection extends Collection implements \MVC\Domain\AlbumCollection {function targetClass( ) {return "\MVC\Domain\Album";}}
class MonkCollection extends Collection implements \MVC\Domain\MonkCollection {function targetClass( ) {return "\MVC\Domain\Monk";}}
class EventCollection extends Collection implements \MVC\Domain\EventCollection {function targetClass( ) {return "\MVC\Domain\Event";}}
class PagodaCollection extends Collection implements \MVC\Domain\PagodaCollection {function targetClass( ) {return "\MVC\Domain\Pagoda";}}
class AskCollection extends Collection implements \MVC\Domain\AskCollection {function targetClass( ) {return "\MVC\Domain\Ask";}}
class GuestCollection extends Collection implements \MVC\Domain\GuestCollection {function targetClass( ) {return "\MVC\Domain\Guest";}}
class CourseCollection extends Collection implements \MVC\Domain\CourseCollection {function targetClass( ) {return "\MVC\Domain\Course";}}
class CourseLessionCollection extends Collection implements \MVC\Domain\CourseLessionCollection {function targetClass( ) {return "\MVC\Domain\CourseLession";}}
class ConfigCollection extends Collection implements \MVC\Domain\ConfigCollection {function targetClass( ) {return "\MVC\Domain\Config";}}
class SponsorCollection extends Collection implements \MVC\Domain\SponsorCollection {function targetClass( ) {return "\MVC\Domain\Sponsor";}}
class SponsorPersonCollection extends Collection implements \MVC\Domain\SponsorPersonCollection {function targetClass( ) {return "\MVC\Domain\SponsorPerson";}}
class PanelAdsCollection extends Collection implements \MVC\Domain\PanelAdsCollection {function targetClass( ) {return "\MVC\Domain\PanelAds";}}
class PanelNewsCollection extends Collection implements \MVC\Domain\PanelNewsCollection {function targetClass( ) {return "\MVC\Domain\PanelNews";}}
class PanelCategoryVideoCollection extends Collection implements \MVC\Domain\PanelCategoryVideoCollection {function targetClass( ) {return "\MVC\Domain\PanelCategoryVideo";}}
class PanelCategoryVideoDetailCollection extends Collection implements \MVC\Domain\PanelCategoryVideoDetailCollection {function targetClass( ) {return "\MVC\Domain\PanelCategoryVideoDetail";}}
class TaskCollection extends Collection implements \MVC\Domain\TaskCollection {function targetClass( ) {return "\MVC\Domain\Task";}}
class PaidCollection extends Collection implements \MVC\Domain\PaidCollection {function targetClass( ) {return "\MVC\Domain\Paid";}}
class TrackingCollection extends Collection implements \MVC\Domain\TrackingCollection {function targetClass( ) {return "\MVC\Domain\Tracking";}}
?>
