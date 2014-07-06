<?php
namespace MVC\Mapper;
require_once( "mvc/base/domain/Collections.php");
require_once( "mvc/base/mapper/Collection.php");

class UserCollection 			extends Collection implements \MVC\Domain\UserCollection 			{function targetClass( ) {return "\MVC\Domain\User";}}
class PagodaCollection 			extends Collection implements \MVC\Domain\PagodaCollection			{function targetClass(){return "\MVC\Domain\Pagoda";}}
class MonkCollection 			extends Collection implements \MVC\Domain\MonkCollection			{function targetClass(){return "\MVC\Domain\Monk";}}
class EventCollection 			extends Collection implements \MVC\Domain\EventCollection			{function targetClass(){return "\MVC\Domain\Event";}}

?>