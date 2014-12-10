<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class AlbumCollection 			extends Collection implements \MVC\Domain\AlbumCollection 			{function targetClass( ) {return "\MVC\Domain\Album";			}}
class AnimeCollection 			extends Collection implements \MVC\Domain\AnimeCollection 			{function targetClass( ) {return "\MVC\Domain\Anime";			}}
class FeedCollection 			extends Collection implements \MVC\Domain\FeedCollection 			{function targetClass( ) {return "\MVC\Domain\Feed";			}}
class CategoryNewsCollection 	extends Collection implements \MVC\Domain\CategoryNewsCollection 	{function targetClass( ) {return "\MVC\Domain\CategoryNews";	}}
class CategoryBTypeCollection 	extends Collection implements \MVC\Domain\CategoryBTypeCollection 	{function targetClass( ) {return "\MVC\Domain\CategoryBType";	}}
class CategoryVideoCollection 	extends Collection implements \MVC\Domain\CategoryVideoCollection 	{function targetClass( ) {return "\MVC\Domain\CategoryVideo";	}}
class NewsCollection 			extends Collection implements \MVC\Domain\NewsCollection 			{function targetClass( ) {return "\MVC\Domain\News";			}}

class VideoCollection 			extends Collection implements \MVC\Domain\VideoCollection 			{function targetClass( ) {return "\MVC\Domain\Video";			}}
class VideoLibraryCollection 	extends Collection implements \MVC\Domain\VideoLibraryCollection 	{function targetClass( ) {return "\MVC\Domain\VideoLibrary";	}}
class VideoDisableCollection 	extends Collection implements \MVC\Domain\VideoDisableCollection 	{function targetClass( ) {return "\MVC\Domain\VideoDisable";	}}
class VideoMonkCollection 		extends Collection implements \MVC\Domain\VideoMonkCollection 		{function targetClass( ) {return "\MVC\Domain\VideoMonk";		}}
class VoiceBookCollection 		extends Collection implements \MVC\Domain\VoiceBookCollection 		{function targetClass( ) {return "\MVC\Domain\VoiceBook";		}}

class UserCollection 			extends Collection implements \MVC\Domain\UserCollection 			{function targetClass( ) {return "\MVC\Domain\User";			}}
class ConfigCollection 			extends Collection implements \MVC\Domain\ConfigCollection			{function targetClass(){return "\MVC\Domain\Config";			}}
class PageCollection 			extends Collection implements \MVC\Domain\PageCollection			{function targetClass(){return "\MVC\Domain\Page";				}}
class GuestCollection 			extends Collection implements \MVC\Domain\GuestCollection			{function targetClass(){return "\MVC\Domain\Guest";				}}

class PagodaCollection 			extends Collection implements \MVC\Domain\PagodaCollection			{function targetClass(){return "\MVC\Domain\Pagoda";			}}
class EventCollection 			extends Collection implements \MVC\Domain\EventCollection			{function targetClass(){return "\MVC\Domain\Event";				}}

?>