<?php

namespace PhalconCart\Core\Initializer;

class BackendService extends AbstractInitializer
{
  public function register(\Phalcon\Config $config)
  {
    $this->_config = $config;
    $this->attachLogService($config);
    $this->attachDatabaseService($config);
    $this->attachViewService($config->application->voltCacheDir, $config->application->backendViewDir);
    $this->attachUrlResolver();
    $this->attachDispatcher();
    return $this;
  }

  public function attachDispatcher()
  {
    $this->_di->set('dispatcher', function () {
      $dispatcher = new \Phalcon\Mvc\Dispatcher();
      $dispatcher->setDefaultNamespace('PhalconCart\\Controllers\\Backend');
      return $dispatcher;
    });
    return $this;
  }
}