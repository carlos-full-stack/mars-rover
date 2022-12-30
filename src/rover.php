<?php

namespace Rover;

require("../vendor/autoload.php");

    class Rover {

        public $name = "Curiosity";
        public $location = array();
        public $direction;
        public $isStopped;
        public $response;


        public function __construct( $name, $location, $direction )
        {
            $this->name = $name;
            $this->location = array( 'x' => $location['x'], 'y' => $location['y'] );
            $this->direction = $direction;

        }

        
    }