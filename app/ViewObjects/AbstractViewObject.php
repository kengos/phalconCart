<?php

namespace PhalconCart\ViewObjects;

abstract class AbstractViewObject
{
  public $owner;

  public function __construct($owner)
  {
    $this->owner = $owner;
  }
}