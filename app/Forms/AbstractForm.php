<?php

namespace PhalconCart\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

abstract class AbstractForm extends \Phalcon\Forms\Form
{
  const KEY_FILTERS = 'filters';
  const KEY_VALIDATORS = 'validators';

  abstract protected function elements();
  abstract public function buildService();

  protected function buildElements()
  {
    foreach($this->getElementBuilder()->build($this->elements()) as &$element)
    {
      $this->add($element);
    }
  }

  protected function buildValidator($params)
  {
    return new $params;
  }

  protected function getElementBuilder()
  {
    return \Phalcon\Di::getDefault()->getElementBuilder();
  }
}