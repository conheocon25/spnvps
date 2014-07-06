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
interface PagodaFinder			extends Finder {}
interface MonkFinder			extends Finder {}
interface EventFinder			extends Finder {}
?>
