<?php

namespace PhalconCart\Models;

use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\Email;

class User extends AbstractModel
{
  protected $_tableName = 'users';

  public function validation()
  {
    $this->validate(new Email(['field' => 'email']));
    $this->validate(new Uniqueness(['field' => 'email']));
    return $this->validationHasFailed() != true;
  }
}