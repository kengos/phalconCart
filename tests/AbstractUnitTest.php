<?php

abstract class AbstractUnitTest extends \PHPUnit_Framework_TestCase
{
  protected $_service;

  /**
   * @var bool
   */
  protected $_loaded = false;

  public function setUp()
  {
    $this->_service = $this->loadService();
    \Phalcon\DI::setDefault($this->_service->getDI());

    $this->_loaded = true;
  }

  protected function tearDown()
  {
    $di = $this->getDI();
    $di::reset();
    parent::tearDown();
  }

  protected function loadService()
  {
    return require APP_PATH . "/config/initializer/console.php";
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
    return $this->_service->getDI();
  }

}