<?php

namespace PhalconCart\Core\Translate;

use Phalcon\Translate\Adapter\NativeArray;

class Base
{
  protected $_path;
  protected $_cache = [];

  public function __construct($lang)
  {
    $this->_path = APP_PATH . '/config/messages/' . $lang . '/'; // TODO
  }

  public function __get($category)
  {
    return $this->getTranslation($category);
  }

  public function getTranslation($category)
  {
    if(!isset($this->_cache[$category])) {
      $this->_cache[$category] = new NativeArray([
        'content' => $this->getTranslationContent($category)
      ]);
    }
    return $this->_cache[$category];
  }

  protected function getTranslationContent($category)
  {
    $path = $this->_path . $category . '.php';
    if (file_exists($path)) {
      return require($path);
    } else {
      return [];
    }
  }
}