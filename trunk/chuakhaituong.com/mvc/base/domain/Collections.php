<?php
namespace MVC\Domain;

interface AppCollection extends \Iterator {function add( Object $App );}
interface UserCollection extends \Iterator {function add( Object $user );}
interface CategoryTaskCollection extends \Iterator {function add( Object $CategoryTask );}
interface CategoryNewsCollection extends \Iterator {function add( Object $CategoryNews );}
interface CategoryVideoCollection extends \Iterator {function add( Object $CategoryVideo );}
interface CategoryAskCollection extends \Iterator {function add( Object $CategoryAsk );}
interface CategoryBTypeCollection extends \Iterator {function add( Object $CategoryBType );}
interface CategoryPaidCollection extends \Iterator {function add( Object $CategoryPaid );}
interface PageCollection extends \Iterator {function add( Object $Page );}
interface PageNavigationCollection extends \Iterator {function add( Object $PageNavigation );}
interface NewsCollection extends \Iterator {function add( Object $News );}
interface VideoCollection extends \Iterator {function add( Object $Video );}
interface VideoMonkCollection extends \Iterator {function add( Object $VideoMonk );}
interface VideoLibraryCollection extends \Iterator {function add( Object $VideoLibrary );}
interface VideoPagodaCollection extends \Iterator {function add( Object $VideoPagoda );}
interface VideoSponsorCollection extends \Iterator {function add( Object $VideoSponsor );}
interface AlbumCollection extends \Iterator {function add( Object $Album);}
interface MonkCollection extends \Iterator {function add( Object $Monk);}
interface EventCollection extends \Iterator {function add( Object $Event);}
interface PagodaCollection extends \Iterator {function add( Object $Pagoda);}
interface AskCollection extends \Iterator {function add( Object $Ask);}
interface GuestCollection extends \Iterator {function add( Object $Guest);}
interface CourseCollection extends \Iterator {function add( Object $Course);}
interface CourseLessionCollection extends \Iterator {function add( Object $CourseLession);}
interface ConfigCollection extends \Iterator {function add( Object $Config);}
interface SponsorCollection extends \Iterator {function add( Object $Sponsor);}
interface SponsorPersonCollection extends \Iterator {function add( Object $SponsorPerson);}
interface PanelAdsCollection extends \Iterator {function add( Object $PanelAds);}
interface PanelNewsCollection extends \Iterator {function add( Object $PanelNews);}
interface PanelCategoryVideoCollection extends \Iterator {function add( Object $PanelCategoryVideo);}
interface TaskCollection extends \Iterator {function add( Object $Task);}
interface PaidCollection extends \Iterator {function add( Object $Paid);}
interface TrackingCollection extends \Iterator {function add( Object $Tracking);}
?>
