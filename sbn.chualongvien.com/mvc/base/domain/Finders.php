<?php
namespace MVC\Domain;

interface Finder {
    function find( $id );
    function findAll();

    function update( Object $object );
    function insert( Object $obj );
    //function delete();
}

interface UserFinder  			extends Finder {}
interface UserPagodaFinder  	extends Finder {}
interface UserDistrictFinder  	extends Finder {}
interface UserProvinceFinder  	extends Finder {}

interface ConfigFinder 			extends Finder {}
interface GuestFinder 			extends Finder {}
interface PagodaFinder			extends Finder {}
interface MonkFinder			extends Finder {}
interface ProvinceFinder		extends Finder {}
interface DistrictFinder		extends Finder {}

interface PPostFinder			extends Finder {}
interface PAlbumFinder			extends Finder {}
interface PVideoFinder			extends Finder {}

?>
