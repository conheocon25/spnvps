<?php
namespace MVC\Domain;

interface UserCollection 			extends \Iterator {function add( Object $object );}
interface UserPagodaCollection 		extends \Iterator {function add( Object $object );}
interface UserDistrictCollection 	extends \Iterator {function add( Object $object );}
interface UserProvinceCollection 	extends \Iterator {function add( Object $object );}

interface ConfigCollection 			extends \Iterator {function add( Object $object );}
interface PageCollection 			extends \Iterator {function add( Object $object );}
interface GuestCollection 			extends \Iterator {function add( Object $object );}

interface PagodaCollection 			extends \Iterator {function add( Object $object );}
interface MonkCollection 			extends \Iterator {function add( Object $object );}
interface ProvinceCollection 		extends \Iterator {function add( Object $object );}
interface DistrictCollection 		extends \Iterator {function add( Object $object );}

interface PPostCollection 			extends \Iterator {function add( Object $object );}
interface PAlbumCollection 			extends \Iterator {function add( Object $object );}
interface PVideoCollection 			extends \Iterator {function add( Object $object );}
?>
