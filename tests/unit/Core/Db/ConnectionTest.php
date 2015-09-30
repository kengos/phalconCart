<?php

namespace Test\Unit\Core\Db;

class ConnectionTest extends \AbstractUnitTest
{
  public function testGetSlave()
  {
    $connection = $this->getDI()->getShared('slaveDb');
    $this->assertInstanceOf('\PhalconCart\Core\Db\Mysql', $connection);
  }

  public function testGetMaster()
  {
    $connection = $this->getDI()->getShared('masterDb');
    $this->assertInstanceOf('\PhalconCart\Core\Db\Mysql', $connection);
  }
}