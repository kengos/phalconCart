<?php

namespace Test\Unit\Models;

use PhalconCart\Models\User as User;

class UserTest extends \AbstractUnitTest
{
  public function testCreate()
  {
    User::findFirst();
    $user = new User();
    $user->email = "foo@example.jp";
    $user->password_digest = "bar";
    $this->assertTrue($user->save());
    $this->assertTrue($user->delete());
  }
}