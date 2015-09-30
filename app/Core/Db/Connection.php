<?php

namespace PhalconCart\Core\Db;

class Connection
{
  protected $_config;

  public function __construct(\Phalcon\Config $config)
  {
    $this->_config = $config->db;
  }

  public function getMaster()
  {
    return $this->buildConnection($this->_config->adapterType, $this->_config->master->toArray());
  }

  public function getSlave()
  {
    $connection = $this->selectSlave($this->_config->adapterType, $this->_config->slaves->toArray());
    if($connection != null) {
      return $connection;
    }
    return $this->getMaster();
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
      return new Mysql($config);
    } else {
      throw \Exception("Unknown Adapter type " . $adapterType);
    }
  }
}