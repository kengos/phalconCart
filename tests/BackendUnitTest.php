<?php

abstract class BackendUnitTest extends \AbstractUnitTest
{
  protected $_application;

  public function setUp()
  {
    parent::setUp();
    $this->_application = $this->buildApplication();
  }

  protected function tearDown()
  {
    parent::tearDown();
    $this->_application = null;
    $_SESSION = [];
    $_GET = [];
    $_POST = [];
    $_COOKIE = [];
  }

  protected function buildApplication()
  {
    return new \Phalcon\Mvc\Application($this->_service->getDI());
  }

  /**
   * @override
   */
  protected function loadService()
  {
    return require APP_PATH . "/config/initializer/backend.php";
  }

  protected function dispatch($url)
  {
    $this->getDI()->setShared('response', $this->_application->handle($url));
  }

  protected function getResponse()
  {
    return $this->getDI()->getShared('response')->getContent();
  }

  protected function getHeaders()
  {
    return $this->getDI()->getShared('response')->getHeaders();
  }

  protected function getDispatcher()
  {
    return $this->getDI()->getShared('dispatcher');
  }

  protected function shouldDispatched($controllerName, $actionName)
  {
    $this->assertEquals($this->getDispatcher()->getControllerName(), $controllerName);
    $this->assertEquals($this->getDispatcher()->getActionName(), $actionName);
  }
}