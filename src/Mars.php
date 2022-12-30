<?php

namespace Mars;

use Planet\Planet;

require("../vendor/autoload.php");


    class Mars extends Planet {

        private $name = "Mars";
        public $area = array();
        public $obstacle = array();

        public function __construct()
        {
            $this->area = array( 'x' => 2, 'y' => 10 );
            $this->obstacle = array( 'x' => 2, 'y' => 5 );
        }

        public function setArea( $x, $y )
        {
            $this->area = array( 'x' => $x, 'y' => $y);
            return $this->name . " area is " . implode( "-", $this->area );
        }

        public function setObstacle( $x, $y )
        {
            $this->obstacle = array( 'x' => $x, 'y' => $y);
            return $this->name . " obstacle is at " . implode( "-", $this->obstacle );
        }

    }