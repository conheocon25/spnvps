<?php
namespace MVC\Domain;

interface UserCollection 			extends \Iterator {function add( Object $object );}
interface ConfigCollection 			extends \Iterator {function add( Object $object );}
interface PageCollection 			extends \Iterator {function add( Object $object );}
interface GuestCollection 			extends \Iterator {function add( Object $object );}

interface PagodaCollection 			extends \Iterator {function add( Object $object );}
interface MonkCollection 			extends \Iterator {function add( Object $object );}
interface ProvinceCollection 		extends \Iterator {function add( Object $object );}
interface DistrictCollection 		extends \Iterator {function add( Object $object );}
?>
