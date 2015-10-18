<?php

use Phalcon\Mvc\Model\Transaction\Manager as TransactionManager;

abstract class AbstractService
{
  public $useTransaction = false;
  protected $_exception = null;

  public function execute()
  {
    try {

      if($this->useTransaction) {
      }

      if(!$this->beforeProcess()) {
        return false;
      }

      $this->process();
      return $this->afterProcess();
    } catch(\Exception $e) {
      $this->_exception = $e;
      // rollback
    } finally {
      $this->finallyProcess();
    }
  }

  abstract protected function process();

  protected function beforeProcess()
  {
    return true;
  }

  protected function afterProcess()
  {
    return true;
  }

  protected function finallyProcess()
  {

  }
}