<?php

namespace PhalconCart\Core\Initializer;

use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;

abstract class AbstractInitializer
{
  /**
   * @var \Phalcon\Di
   */
  protected $_di;

  /**
   * @var \Phalcon\Config
   */
  protected $_config;

  abstract public function register(\Phalcon\Config $config);

  public function __construct()
  {
    $this->_di = new \Phalcon\Di\FactoryDefault();
  }

  public function getDI()
  {
    return $this->_di;
  }

  public function getConfig()
  {
    return $this->_config;
  }

  public function attachDatabaseService(\Phalcon\Config $config)
  {
    $connection = new \PhalconCart\Components\Db\Connection($config);
    $this->_di->setShared('masterDb', function () use ($connection) {
      return $connection->getMaster();
    });

    $this->_di->setShared('slaveDb', function () use ($connection)  {
      return $connection->getSlave();
    });

    // Attach MetaDataAdapter
    $this->_di->set('modelsMetadata', function () {
      return new \Phalcon\Mvc\Model\Metadata\Memory();
    });
    return $this;
  }

  public function attachViewService($voltCacheDir, $viewPath)
  {
    $this->attachVoltService($voltCacheDir);
    $this->_di->setShared('view', function () use ($viewPath) {
      $view = new \Phalcon\Mvc\View();
      $view->setViewsDir($viewPath);
      $view->registerEngines([
        '.volt'  => 'voltService',
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
        ]);
        return $view;
    });
    return $this;
  }

  public function attachVoltService($voltCacheDir)
  {
    $this->_di->set('voltService', function ($view, $di) use ($voltCacheDir) {
      $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
      $volt->setOptions([
        'compiledPath'      => $voltCacheDir,
        'compiledSeparator' => '_',
        'compiledExtension' => '.compiled'
      ]);
      return $volt;
    });
    return $this;
  }

  public function attachLogService($config)
  {
    // Attach log service
    $this->_di->setShared('logger', function () use ($config) {
      return new \Phalcon\Logger\Adapter\File($config->application->logDir . $config->env . '.log');
    });
    return $this;
  }

  public function attachRouter($router)
  {
    $this->_di->setShared('router', $router);
  }

  public function attachUrlResolver($baseUri = '/')
  {
    $this->_di->setShared('url', function () use ($baseUri) {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri($baseUri);
        return $url;
    });
    return $this;
  }
}