<?php

namespace Test\Functional\Backend;

class UsersControllerTest extends \BackendUnitTest
{
  public function testIndex()
  {
    $this->dispatch("/users");
    $this->shouldDispatched("Users", "index");
  }
}