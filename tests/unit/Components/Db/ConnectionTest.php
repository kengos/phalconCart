<?php

namespace Test\Unit\Components\Db;

class ConnectionTest extends \AbstractUnitTest
{
  public function testGetSlave()
  {
    $connection = $this->getDI()->getShared('slaveDb');
    $this->assertInstanceOf('\Phalcon\Db\Adapter\Pdo\Mysql', $connection);
  }

  public function testGetMaster()
  {
    $connection = $this->getDI()->getShared('masterDb');
    $this->assertInstanceOf('\Phalcon\Db\Adapter\Pdo\Mysql', $connection);
  }
}