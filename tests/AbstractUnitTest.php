<?php

abstract class AbstractUnitTest extends \Phalcon\Test\UnitTestCase
{
  /**
   * @var \Voice\Cache
   */
  protected $_cache;

  /**
   * @var \Phalcon\Config
   */
  protected $_config;

  /**
   * @var bool
   */
  private $_loaded = false;

  public function setUp(\Phalcon\DiInterface $di = NULL, \Phalcon\Config $config = NULL)
  {
    $di = \Phalcon\DI::getDefault();
    // TODO setting di
    parent::setUp($di);

    $this->_loaded = true;
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
}