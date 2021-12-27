<?php
namespace App\User\Aggregates;

use App\User\Aggregates\Interfaces\UsersAggregateInterface;
use App\User\Iterators\UserListGenderIterator;

/**
 * 集約オブジェクト
 * Aggregate Class
 * Class UsersAggregate
 */
class UsersGenderAggregate implements UsersAggregateInterface {

  use UsersAggregateTrait;

  public function createIterator()
  {
    return new UserListGenderIterator($this->userList);
  }
}