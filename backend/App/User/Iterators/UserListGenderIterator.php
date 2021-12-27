<?php
namespace App\User\Iterators;

use App\User\Iterators\Interfaces\UserListIteratorInterface;

/**
 * 名前と年齢と性別を返すイテレータ
 * Iterator Class
 * Class UserListIterator
 */
class UserListGenderIterator implements UserListIteratorInterface {

  use UserListTrait;

  public function next()
  {
    $user = $this->users[$this->position++];
    return sprintf("%s (age : %s, gender : %s)", $user['name'], $user['age'], $user['gender']);
  }
}