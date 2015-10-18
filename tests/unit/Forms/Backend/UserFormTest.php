<?php

namespace Test\Unit\Forms\Backend;

use PhalconCart\Forms\Backend\UserForm as UserForm;

class UserFormTest extends \AbstractUnitTest
{
  public function testInitialize()
  {
    var_dump(\Phalcon\Di::getDefault()->getElementBuilder());
    $form = new UserForm();
  }

}