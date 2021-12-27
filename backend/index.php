<?php
require_once 'autoload.php';

use App\User\RosterClient;
use App\User\Aggregates\UsersNameAggregate;
use App\User\Aggregates\UsersAggregate;
use App\User\Aggregates\UsersGenderAggregate;

$users_01 = ["name 01", "name 02", "name 03", "name 04"];
$users_02 = [
  ["name" => "name 01", "age" => 20],
  ["name" => "name 02", "age" => 21],
  ["name" => "name 03", "age" => 22],
  ["name" => "name 04", "age" => 23]
];
$users_03 = [
  ["name" => "name 01", "age" => 20, "gender" => "men"],
  ["name" => "name 02", "age" => 21, "gender" => "men"],
  ["name" => "name 03", "age" => 22, "gender" => "women"],
  ["name" => "name 04", "age" => 23, "gender" => "men"]
];

$list = new RosterClient(new UsersNameAggregate($users_01));

echo $list->getUsers();

$list = new RosterClient(new UsersAggregate($users_02));

echo $list->getUsers();

$list = new RosterClient(new UsersGenderAggregate($users_03));

echo $list->getUsers();