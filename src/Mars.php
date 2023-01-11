<?php

namespace Mars;

use Planet\Planet;

require("../vendor/autoload.php");


    class Mars extends Planet {

        private $name = "Mars";
        public $area =  array( 'x' => 25, 'y' => 25);
        public $obstacle =  array( 'x' => 6, 'y' => 6);
    }