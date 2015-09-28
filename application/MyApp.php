<?php

class MyApp
{
    /** @var bool will be set by aspect on method call interception */
    public $aspectMarker = false;

    public function __call($name, $arguments)
    {
        echo "invoked dynamically '$name'..'.\n";
    }

}