<?php

namespace PhalconCart\Core\Initializer;

class ConsoleService extends AbstractInitializer
{
  public function register(\Phalcon\Config $config)
  {
    $this->_config = $config;
    $this->attachLogService($config);
    $this->attachDatabaseService($config);
    return $this;
  }
}