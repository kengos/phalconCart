<?php

namespace PhalconCart\Models;

use Phalcon\Mvc\Model\Behavior\Timestampable;

abstract class AbstractModel extends \Phalcon\Mvc\Model
{
  protected $_tableName;
  protected $_timestamps = true;

  public function initialize()
  {
    $this->setSource($this->_tableName);
    $this->setWriteConnectionService('masterDb');
    $this->setReadConnectionService('slaveDb');

    if($this->_timestamps) {
      $this->addBehavior(new Timestampable([
          'beforeValidationOnCreate' => ['field' => ['created_at', 'updated_at'], 'format' => 'Y-m-d H:i:s'],
          'beforeValidationOnUpdate' => ['field' => 'updated_at', 'format' => 'Y-m-d H:i:s']
        ])
      );
    }
  }

}