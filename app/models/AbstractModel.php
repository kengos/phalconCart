<?php

abstract class AbstractModel extends \Phalcon\Mvc\Model
{
  public function initialize()
  {
    $this->setWriteConnectionService('dbMaster');
    $this->setReadConnectionService('dbSlave');
  }
}