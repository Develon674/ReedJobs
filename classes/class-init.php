<?php

namespace Develon674\ReedJobs;
use Dhii\Data\Container\ContainerInterface;

class Init {

    protected $c;

    public function __construct(ContainerInterface $c) {
        $this->c = $c;
    }

    public function run() {
        
    }

}
