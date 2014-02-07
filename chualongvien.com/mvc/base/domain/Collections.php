<?php
namespace MVC\Domain;

interface AppCollection 			extends \Iterator {function add( Object $App );}
interface UserCollection 			extends \Iterator {function add( Object $user );}
interface CategoryNewsCollection 	extends \Iterator {function add( Object $CategoryNews );}
interface CategoryVideoCollection 	extends \Iterator {function add( Object $CategoryVideo );}
interface CategoryBTypeCollection 	extends \Iterator {function add( Object $CategoryBType );}
interface PageCollection 			extends \Iterator {function add( Object $Page );}
interface PageNavigationCollection 	extends \Iterator {function add( Object $PageNavigation );}
interface NewsCollection 			extends \Iterator {function add( Object $News );}
interface VideoCollection 			extends \Iterator {function add( Object $Video );}
interface VideoMonkCollection 		extends \Iterator {function add( Object $VideoMonk );}
interface VideoLibraryCollection 	extends \Iterator {function add( Object $VideoLibrary );}
interface AlbumCollection 			extends \Iterator {function add( Object $Album);}
interface VoiceBookCollection 		extends \Iterator {function add( Object $VoiceBook);}
interface MonkCollection 			extends \Iterator {function add( Object $Monk);}
interface GuestCollection 			extends \Iterator {function add( Object $Guest);}
interface CourseCollection 			extends \Iterator {function add( Object $Course);}
interface CourseLessionCollection 	extends \Iterator {function add( Object $CourseLession);}
interface ConfigCollection 			extends \Iterator {function add( Object $Config);}
?>	