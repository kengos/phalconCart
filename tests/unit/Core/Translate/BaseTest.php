<?php

namespace Test\Unit\Core\Translate;

use \PhalconCart\Core\Translate\Base as Translate;

class BaseTest extends \AbstractUnitTest
{
  public function testTranslate()
  {
    $t = new Translate('ja');
    $this->assertEquals('Foo は必須です。', $t->validation->_('required', ['name' => 'Foo']));
  }
}