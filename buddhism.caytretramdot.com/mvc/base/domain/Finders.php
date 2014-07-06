<?php
namespace MVC\Domain;

interface Finder {
    function find( $id );
    function findAll();

    function update( Object $object );
    function insert( Object $obj );
    //function delete();
}
interface UserFinder			extends Finder {}
interface ProvinceFinder		extends Finder {}
interface DistrictFinder		extends Finder {}
interface PagodaFinder			extends Finder {}
interface MonkFinder			extends Finder {}
interface EventFinder			extends Finder {}
interface EventVideoFinder		extends Finder {}
interface EventImageFinder		extends Finder {}
interface EventMP3Finder		extends Finder {}
?>
