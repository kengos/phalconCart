<?php

abstract class AbstractUnitTest extends \PHPUnit_Framework_TestCase
{
  protected $_di;
  /**
   * @var \Voice\Cache
   */
  protected $_cache;

  /**
   * @var \Phalcon\Config
   */
  protected static $_config;

  /**
   * @var bool
   */
  private $_loaded = false;

  public function setUp()
  {
    $this->_di = $this->initalizeService();
    \Phalcon\DI::setDefault($this->_di);

    $this->_loaded = true;
  }

  protected function tearDown()
  {
    $di = $this->getDI();
    $di::reset();
    parent::tearDown();
  }

  protected function loadConfig($force = false)
  {
    if ($force || self::$_config == null) {
      self::$_config = include APP_PATH . "/config/config.php";
    }
    return self::$_config;
  }

  protected function initalizeService()
  {
    $config = $this->loadConfig();
    // TODO
    include APP_PATH . "/config/loader.php";
    include APP_PATH . "/config/services.php";
    return $di;
  }

  /**
   * Check if the test case is setup properly
   *
   * @throws \PHPUnit_Framework_IncompleteTestError;
   */
  public function __destruct()
  {
    if (!$this->_loaded) {
      throw new \PHPUnit_Framework_IncompleteTestError('Please run parent::setUp().');
    }
  }

  protected function getDI()
  {
    return $this->_di;
  }

}