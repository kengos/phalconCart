<?php

namespace PhalconCart\Core\Forms;

class ElementBuilder extends \Phalcon\Mvc\User\Component
{
  public function build(array $elements)
  {
    $result = [];
    foreach($elements as $key => &$params) {
      $result[] = $this->buildElement($key, $params);
    }
    return $result;
  }

  public function buildElement($key, $params)
  {
    $element = $this->buildElementObject($params['class'], $key);
    $element->setLabel($this->buildLabel($params['label'], $key));
    return $element;
  }

  protected function buildElementObject($class, $key)
  {
    switch($class) {
      case: 'Text':
        return new \Phalcon\Forms\Element\Text($key);
      case: 'TextArea':
        return new \Phalcon\Forms\Element\TextArea($key);
      case: 'Password':
        return new \Phalcon\Forms\Element\Password($key);
      case 'Select':
        return new \Phalcon\Forms\Element\Select($key);
      default:
        return new $class($key);
    }
  }

  protected function buildLabel($label, $key)
  {
    $v = $label === null ? $key : $label;

  }

  protected function getTranslate()
  {
    return $this->getDI()->getTranslate();
  }
}