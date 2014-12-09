<?php
namespace MVC\Domain;

interface AlbumCollection 			extends \Iterator {function add( Object $object );}
interface AnimeCollection 			extends \Iterator {function add( Object $object );}
interface FeedCollection 			extends \Iterator {function add( Object $object );}
interface CategoryNewsCollection 	extends \Iterator {function add( Object $object );}
interface CategoryDocumentCollection 	extends \Iterator {function add( Object $object );}
interface CategoryBTypeCollection 	extends \Iterator {function add( Object $object );}
interface CategoryVideoCollection 	extends \Iterator {function add( Object $object );}
interface NewsCollection 			extends \Iterator {function add( Object $object );}
interface DocumentCollection 		extends \Iterator {function add( Object $object );}

interface VideoCollection 			extends \Iterator {function add( Object $object );}
interface VideoLibraryCollection 	extends \Iterator {function add( Object $object );}
interface VideoDisableCollection 	extends \Iterator {function add( Object $object );}
interface VideoMonkCollection 		extends \Iterator {function add( Object $object );}
interface VoiceBookCollection 		extends \Iterator {function add( Object $object );}

interface UserCollection 			extends \Iterator {function add( Object $object );}
interface ConfigCollection 			extends \Iterator {function add( Object $object );}
interface PageCollection 			extends \Iterator {function add( Object $object );}
interface GuestCollection 			extends \Iterator {function add( Object $object );}

interface ProvinceCollection 		extends \Iterator {function add( Object $object );}
interface DistrictCollection 		extends \Iterator {function add( Object $object );}
interface PagodaCollection 			extends \Iterator {function add( Object $object );}
interface EventCollection 			extends \Iterator {function add( Object $object );}
interface MonkCollection 			extends \Iterator {function add( Object $object );}

interface PPostCollection 			extends \Iterator {function add( Object $object );}
interface PAlbumCollection 			extends \Iterator {function add( Object $object );}
interface PVideoCollection 			extends \Iterator {function add( Object $object );}

?>
