<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class AlbumCollection 			extends Collection implements \MVC\Domain\AlbumCollection 			{function targetClass( ) {return "\MVC\Domain\Album";}}
class AnimeCollection 			extends Collection implements \MVC\Domain\AnimeCollection 			{function targetClass( ) {return "\MVC\Domain\Anime";}}
class FeedCollection 			extends Collection implements \MVC\Domain\FeedCollection 			{function targetClass( ) {return "\MVC\Domain\Feed";}}
class CategoryNewsCollection 	extends Collection implements \MVC\Domain\CategoryNewsCollection 	{function targetClass( ) {return "\MVC\Domain\CategoryNews";}}
class CategoryDocumentCollection 	extends Collection implements \MVC\Domain\CategoryDocumentCollection 	{function targetClass( ) {return "\MVC\Domain\CategoryDocument";}}
class CategoryBTypeCollection 	extends Collection implements \MVC\Domain\CategoryBTypeCollection 	{function targetClass( ) {return "\MVC\Domain\CategoryBType";}}
class CategoryVideoCollection 	extends Collection implements \MVC\Domain\CategoryVideoCollection 	{function targetClass( ) {return "\MVC\Domain\CategoryVideo";}}
class NewsCollection 			extends Collection implements \MVC\Domain\NewsCollection 			{function targetClass( ) {return "\MVC\Domain\News";}}
class DocumentCollection 		extends Collection implements \MVC\Domain\DocumentCollection 		{function targetClass( ) {return "\MVC\Domain\Document";}}

class VideoCollection 			extends Collection implements \MVC\Domain\VideoCollection 			{function targetClass( ) {return "\MVC\Domain\Video";}}
class VideoLibraryCollection 	extends Collection implements \MVC\Domain\VideoLibraryCollection 	{function targetClass( ) {return "\MVC\Domain\VideoLibrary";}}
class VideoMonkCollection 		extends Collection implements \MVC\Domain\VideoMonkCollection 		{function targetClass( ) {return "\MVC\Domain\VideoMonk";}}
class VoiceBookCollection 		extends Collection implements \MVC\Domain\VoiceBookCollection 		{function targetClass( ) {return "\MVC\Domain\VoiceBook";}}

class UserCollection 			extends Collection implements \MVC\Domain\UserCollection 			{function targetClass( ) {return "\MVC\Domain\User";}}
class ConfigCollection 			extends Collection implements \MVC\Domain\ConfigCollection			{function targetClass(){return "\MVC\Domain\Config";}}
class PageCollection 			extends Collection implements \MVC\Domain\PageCollection			{function targetClass(){return "\MVC\Domain\Page";}}
class GuestCollection 			extends Collection implements \MVC\Domain\GuestCollection			{function targetClass(){return "\MVC\Domain\Guest";}}

class ProvinceCollection 		extends Collection implements \MVC\Domain\PagodaCollection			{function targetClass(){return "\MVC\Domain\Province";}}
class DistrictCollection 		extends Collection implements \MVC\Domain\DistrictCollection		{function targetClass(){return "\MVC\Domain\District";}}

class PagodaCollection 			extends Collection implements \MVC\Domain\PagodaCollection			{function targetClass(){return "\MVC\Domain\Pagoda";}}
class EventCollection 			extends Collection implements \MVC\Domain\EventCollection			{function targetClass(){return "\MVC\Domain\Event";}}
class MonkCollection 			extends Collection implements \MVC\Domain\MonkCollection			{function targetClass(){return "\MVC\Domain\Monk";}}
class PPostCollection 			extends Collection implements \MVC\Domain\PPostCollection			{function targetClass(){return "\MVC\Domain\PPost";}}
class PAlbumCollection 			extends Collection implements \MVC\Domain\PAlbumCollection			{function targetClass(){return "\MVC\Domain\PAlbum";}}
class PVideoCollection 			extends Collection implements \MVC\Domain\PVideoCollection			{function targetClass(){return "\MVC\Domain\PVideo";}}

?>