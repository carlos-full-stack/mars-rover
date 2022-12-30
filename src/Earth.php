<?php

namespace Earth;

use Planet\Planet;
use Rover\Rover;

require("../vendor/autoload.php");

    class Earth extends Planet {

        private $name = "Earth";

        static function sendCommandRover( $collection )
        {
            if ( !preg_match( '[F|L|R]', $collection )  ) return "Please introduce a valid collection";

            $newRover = new Rover( "Curiosity", $location = array( 'x' => 2, 'y' => 1 ), "N" );
            return $newRover->moveRover( $collection );
        }

    }

    echo Earth::sendCommandRover( "FFF" );