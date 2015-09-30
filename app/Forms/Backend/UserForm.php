<?php

namespace PhalconCart\Forms\Backend;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class UserForm extends \Phalcon\Forms\Form
{
  public function initialize($entity = null, $options = [])
  {
    if (!isset($options['edit'])) {
      $element = new Text("id");
      $this->add($element->setLabel("Id"));
    } else {
      $this->add(new Hidden("id"));
    }
    $email = new Text("email");
    $email->setLabel("Email");
    $email->setFilters(['string']);
    $email->addValidators([
      new PresenceOf([
        'message' => 'Email is required'
      ]),
      new Email([
        'message' => 'Email is not valid'
      ])
    ]);
    $this->add($email);
    $password = new Password("password");
    $password->setLabel("Password");
    $password->setFilters(['string']);
    $password->addValidators([
      new PresenceOf([
        'message' => 'Password is required'
      ])
    ]);
    $this->add($password);
  }

  public function messages($key)
  {
    if(!$this->hasMessagesFor($key)) {
      return null;
    }
    return implode($this->getMessagesFor($key), "\n");
  }
}