<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class UserCollection 			extends Collection implements \MVC\Domain\UserCollection 			{function targetClass( ) {return "\MVC\Domain\User";}}
class UserPagodaCollection 		extends Collection implements \MVC\Domain\UserPagodaCollection 		{function targetClass( ) {return "\MVC\Domain\UserPagoda";}}
class UserDistrictCollection 	extends Collection implements \MVC\Domain\UserDistrictCollection 	{function targetClass( ) {return "\MVC\Domain\UserDistrict";}}
class UserProvinceCollection 	extends Collection implements \MVC\Domain\UserProvinceCollection 	{function targetClass( ) {return "\MVC\Domain\UserProvince";}}

class ConfigCollection 			extends Collection implements \MVC\Domain\ConfigCollection			{function targetClass(){return "\MVC\Domain\Config";}}
class PageCollection 			extends Collection implements \MVC\Domain\PageCollection			{function targetClass(){return "\MVC\Domain\Page";}}
class GuestCollection 			extends Collection implements \MVC\Domain\GuestCollection			{function targetClass(){return "\MVC\Domain\Guest";}}

class PagodaCollection 			extends Collection implements \MVC\Domain\PagodaCollection			{function targetClass(){return "\MVC\Domain\Pagoda";}}
class MonkCollection 			extends Collection implements \MVC\Domain\MonkCollection			{function targetClass(){return "\MVC\Domain\Monk";}}
class ProvinceCollection 		extends Collection implements \MVC\Domain\ProvinceCollection		{function targetClass(){return "\MVC\Domain\Province";}}
class DistrictCollection 		extends Collection implements \MVC\Domain\DistrictCollection		{function targetClass(){return "\MVC\Domain\District";}}

class PPostCollection 			extends Collection implements \MVC\Domain\PPostCollection			{function targetClass(){return "\MVC\Domain\PPost";}}
class PAlbumCollection 			extends Collection implements \MVC\Domain\PAlbumCollection			{function targetClass(){return "\MVC\Domain\PAlbum";}}
class PVideoCollection 			extends Collection implements \MVC\Domain\PVideoCollection			{function targetClass(){return "\MVC\Domain\PVideo";}}

?>