<?php
require_once 'getSetters.php';

class create
{
    public function name()
    {
        $getSetters = new getSetters();

        $getSetters->setName('igor');
        $name = $getSetters->getName();

        return $name;
    }
}

$instance = new create();

echo $instance->name();
