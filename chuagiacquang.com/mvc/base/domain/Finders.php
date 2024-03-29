<?php
namespace MVC\Domain;

interface Finder {
    function find( $id );
    function findAll();

    function update( Object $obj );
    function insert( Object $obj );
    //function delete();
}

interface AppFinder  extends Finder {}
interface UserFinder  extends Finder {}
interface CategoryNewsFinder  extends Finder {}
interface CategoryVideoFinder  extends Finder {}
interface CategoryAskFinder  extends Finder {}
interface NewsFinder  extends Finder {}
interface VideoFinder  extends Finder {}
interface VideoMonkFinder  extends Finder {}
interface VideoPagodaFinder  extends Finder {}
interface AlbumFinder  extends Finder {}
interface MonkFinder  extends Finder {}
interface EventFinder  extends Finder {}
interface PagodaFinder  extends Finder {}
interface AskFinder  extends Finder {}
interface GuestFinder  extends Finder{}
interface CourseFinder  extends Finder{}
interface CourseClassFinder  extends Finder{}
interface ClassLessionFinder  extends Finder{}
interface ConfigFinder  extends Finder{}
interface LinkedFinder  extends Finder{}
interface TaskFinder  extends Finder{}

?>