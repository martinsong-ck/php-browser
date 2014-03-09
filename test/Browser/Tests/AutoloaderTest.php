<?php
namespace Browser\Tests;

use PHPUnit_Framework_TestCase;
use Browser\Autoloader;

class AutoloaderTest extends PHPUnit_Framework_TestCase
{
    public function testAutoload()
    {
        $declared = get_declared_classes();
        $declaredCount = count($declared);
        Autoloader::autoload('FooBarClass');
        $this->assertEquals($declaredCount, count(get_declared_classes()), 'Browser\\Autoloader::autoload() is trying to load classes outside of the Browser namespace');
        Autoloader::autoload('Browser\\Browser');
        $this->assertTrue(in_array('Browser\\Browser', get_declared_classes()), 'Browser\\Autoloader::autoload() failed to autoload the Browser\\Browser class');
    }
}