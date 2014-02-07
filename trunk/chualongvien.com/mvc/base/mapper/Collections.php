<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class AppCollection 			extends Collection implements \MVC\Domain\AppCollection {function targetClass( ) 			{return "\MVC\Domain\App";}}
class UserCollection 			extends Collection implements \MVC\Domain\UserCollection {function targetClass( ) 			{return "\MVC\Domain\User";}}
class CategoryNewsCollection 	extends Collection implements \MVC\Domain\CategoryNewsCollection {function targetClass( ) 	{return "\MVC\Domain\CategoryNews";}}
class CategoryVideoCollection 	extends Collection implements \MVC\Domain\CategoryVideoCollection {function targetClass( ) 	{return "\MVC\Domain\CategoryVideo";}}
class CategoryBTypeCollection 	extends Collection implements \MVC\Domain\CategoryBTypeCollection {function targetClass( ) 	{return "\MVC\Domain\BType";}}
class PageCollection 			extends Collection implements \MVC\Domain\PageCollection {function targetClass( ) 			{return "\MVC\Domain\Page";}}
class NewsCollection 			extends Collection implements \MVC\Domain\NewsCollection {function targetClass( ) 			{return "\MVC\Domain\News";}}
class VideoCollection 			extends Collection implements \MVC\Domain\VideoCollection {function targetClass( ) 			{return "\MVC\Domain\Video";}}
class VideoMonkCollection 		extends Collection implements \MVC\Domain\VideoMonkCollection {function targetClass( ) 		{return "\MVC\Domain\VideoMonk";}}
class VideoLibraryCollection 	extends Collection implements \MVC\Domain\VideoLibraryCollection {function targetClass( ) 	{return "\MVC\Domain\VideoLibrary";}}
class AlbumCollection 			extends Collection implements \MVC\Domain\AlbumCollection {function targetClass( ) 			{return "\MVC\Domain\Album";}}
class VoiceBookCollection 		extends Collection implements \MVC\Domain\VoiceBookCollection {function targetClass( ) 		{return "\MVC\Domain\VoiceBook";}}
class MonkCollection 			extends Collection implements \MVC\Domain\MonkCollection {function targetClass( ) 			{return "\MVC\Domain\Monk";}}
class GuestCollection 			extends Collection implements \MVC\Domain\GuestCollection {function targetClass( ) 			{return "\MVC\Domain\Guest";}}
class CourseCollection 			extends Collection implements \MVC\Domain\CourseCollection {function targetClass( ) 		{return "\MVC\Domain\Course";}}
class CourseLessionCollection 	extends Collection implements \MVC\Domain\CourseLessionCollection {function targetClass( ) 	{return "\MVC\Domain\CourseLession";}}
class ConfigCollection 			extends Collection implements \MVC\Domain\ConfigCollection {function targetClass( ) 		{return "\MVC\Domain\Config";}}

?>
