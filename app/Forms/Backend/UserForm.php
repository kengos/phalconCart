<?php

namespace PhalconCart\Forms\Backend;

class UserForm extends \PhalconCart\Forms\AbstractForm
{
  protected $_entity;

  public function initialize($entity = null)
  {
    $this->_entity = $entity;
    $this->buildElements();
  }

  protected function elements()
  {
    return [
      'email' => [
        'class' => 'Text',
        'options' => [],
        'filters' => ['string'],
        'validation' => ['presenceOf', 'email']
      ],
      'password' => [
        'class' => 'Password',
        'options' => [],
        'filters' => ['string'],
        'validation' => ['presenceOf']
      ]
    ];
  }

  public function messages($key)
  {
    if(!$this->hasMessagesFor($key)) {
      return null;
    }
    return implode($this->getMessagesFor($key), "\n");
  }

  public function buildService()
  {
  }

}