<?php

require_once __DIR__ . '/../vendor/autoload.php';

class TestDynamicConjugation extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        DefaultAspectKernel::getInstance()->init([
            'debug' => true,
            'includePaths' => [__DIR__ . '/../application/']
        ]);
    }

    public function testSimplePointcut()
    {
        $myApp = new MyApp();
        $myApp->method1('method1-arg');
        $this->assertTrue($myApp->aspectMarker);
    }

    public function testNonMatchedMethod()
    {
        $myApp = new MyApp();
        $myApp->methodX('methodX-arg');
        $this->assertFalse($myApp->aspectMarker);
    }

    public function testDynamicConjugationPointcut()
    {
        $myApp = new MyApp();
        $myApp->someMethod('someMethod-arg');
        $this->assertTrue($myApp->aspectMarker);
    }

}
