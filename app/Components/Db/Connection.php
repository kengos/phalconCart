<?php

namespace PhalconCart\Components\Db;

class Connection extends \Phalcon\Mvc\User\Component
{
  private $_master;
  private $_slave;

  public function __construct(\Phalcon\Config $config)
  {
    $this->initialize($config);
  }

  public function initialize(\Phalcon\Config $config)
  {
    $this->_master = $this->buildConnection($config->db->adapterType, $config->db->master->toArray());
    $this->_slave = $this->selectSlave($config->db->adapterType, $config->db->slaves->toArray());
  }

  public function getMaster()
  {
    return $this->_master;
  }

  public function getSlave()
  {
    if($this->_slave != null) {
      return $this->_slave;
    } else {
      return $this->_master;
    }
  }

  private function selectSlave($adapterType, array $configs)
  {
    if(count($configs) == 0) {
      return null;
    }

    shuffle($configs);
    foreach($configs as &$config) {
      try {
        $connection = $this->buildConnection($adapterType, $config);
        return $connection;
      } catch (\Exception $e) {
        // TODO
        \Phalcon\DI::getDefault()->getShared('log')->error(__CLASS__ . '#' . __METHOD__ . '(' . __LINE__ . '): ' . $e->getMessage());
      }
    }
    return null;
  }

  private function buildConnection($adapterType, array $config)
  {
    if($adapterType == 'Mysql') {
      return new \Phalcon\Db\Adapter\Pdo\Mysql($config);
    } else {
      throw \Exception("Unknown Adapter type " . $adapterType);
    }
  }
}