<?php
namespace MVC\Domain;

interface Finder {
    function find( $id );
    function findAll();

    function update( Object $obj );
    function insert( Object $obj );
    //function delete();
}
interface AppFinder  			extends Finder{}
interface UserFinder  			extends Finder{}
interface CategoryNewsFinder  	extends Finder{}
interface CategoryVideoFinder  	extends Finder{}
interface CategoryBTypeFinder  	extends Finder{}
interface NewsFinder  			extends Finder{}
interface VideoFinder  			extends Finder{}
interface VideoMonkFinder  		extends Finder{}
interface VideoLibraryFinder  	extends Finder{}
interface AlbumFinder  			extends Finder{}
interface VoiceBookFinder  		extends Finder{}
interface MonkFinder  			extends Finder{}
interface GuestFinder  			extends Finder{}
interface CourseFinder  		extends Finder{}
interface CourseLessionFinder  	extends Finder{}
interface ConfigFinder  		extends Finder{}
?>