<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class UserCollection 			extends Collection implements \MVC\Domain\UserCollection 			{function targetClass( ) {return "\MVC\Domain\User";}}
class ProvinceCollection 		extends Collection implements \MVC\Domain\ProvinceCollection		{function targetClass(){return "\MVC\Domain\Province";}}
class DistrictCollection 		extends Collection implements \MVC\Domain\DistrictCollection		{function targetClass(){return "\MVC\Domain\District";}}
class PagodaCollection 			extends Collection implements \MVC\Domain\PagodaCollection			{function targetClass(){return "\MVC\Domain\Pagoda";}}
class MonkCollection 			extends Collection implements \MVC\Domain\MonkCollection			{function targetClass(){return "\MVC\Domain\Monk";}}
class EventCollection 			extends Collection implements \MVC\Domain\EventCollection			{function targetClass(){return "\MVC\Domain\Event";}}
class EventVideoCollection 		extends Collection implements \MVC\Domain\EventVideoCollection		{function targetClass(){return "\MVC\Domain\EventVideo";}}
class EventImageCollection 		extends Collection implements \MVC\Domain\EventImageCollection		{function targetClass(){return "\MVC\Domain\EventImage";}}
class EventMP3Collection 		extends Collection implements \MVC\Domain\EventMP3Collection		{function targetClass(){return "\MVC\Domain\EventMP3";}}

?>