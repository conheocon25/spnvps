<?php
namespace MVC\Domain;

interface Finder {
    function find( $id );
    function findAll();

    function update( Object $object );
    function insert( Object $obj );
    //function delete();
}
interface AlbumFinder  			extends Finder {}
interface AnimeFinder  			extends Finder {}
interface UserFinder  			extends Finder {}
interface ConfigFinder 			extends Finder {}
interface GuestFinder 			extends Finder {}
interface FeedFinder			extends Finder {}
interface CategoryNewsFinder 	extends Finder {}
interface CategoryDocumentFinder 	extends Finder {}
interface CategoryBTypeFinder 	extends Finder {}
interface CategoryVideoFinder 	extends Finder {}
interface NewsFinder			extends Finder {}
interface DocumentFinder		extends Finder {}

interface VideoFinder 			extends Finder {}
interface VideoLibraryFinder	extends Finder {}
interface VideoMonkFinder		extends Finder {}
interface VoiceBookFinder		extends Finder {}

interface ProvinceFinder		extends Finder {}
interface DistrictFinder		extends Finder {}
interface PagodaFinder			extends Finder {}
interface EventFinder			extends Finder {}
?>
