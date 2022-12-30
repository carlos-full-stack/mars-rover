<?php

namespace Rover;

use Mars\Mars;

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

        public function detectMarsObstacle( $newLocation)  
        {

            //  This function will check for obstacles before each Rover movement.
            //  If obstacle is detected, message response will be reported to Earh
            //  and collection secuence will be interrupted using the attribute $isStopped;

            $mars1 = new Mars();
            $mars1->obstacle;

            if ( $newLocation == $mars1->obstacle )
            {
                $this->response = ( "Obstacle detected at " . implode( "-", $newLocation ) . "</br>" );
                return $this->isStopped++;
            }

            elseif ( $newLocation['y'] >= $mars1->area['y'] || $newLocation['y'] < 0 )
            {
                $this->response = ( "Limit reached at " . implode( "-", $newLocation ) . "<br/>" );
                return $this->isStopped++;
            }

            else
            {
                $this->location = $newLocation;
            }

        }

        public function moveRover( $collection ) 

            //  This function translate the commands collection and direction
            //  to make them understandable by the Rover. Before each move
            //  will check for obstacles using the detectMarsObstacle function.

        {

            foreach ( str_split( $collection ) as $roverMove ) {

                if ( $this->isStopped ) break;
                
                    if ( $this->direction == "N" )
                    {
                        switch( $roverMove )
                        {

                            case "F" :
                                $newLocation = array ( 'x' => $this->location['x'], 'y' => $this->location['y'] +1 );
                                $this->detectMarsObstacle( $newLocation );
                            break;
                                

                            case "L" :
                                $newLocation = array ( 'x' => $this->location['x'] -1, 'y' => $this->location['y'] );
                                $this->detectMarsObstacle( $newLocation );
                            break;
                                
                            
                            case "R" :
                                $newLocation = array ( 'x' => $this->location['x'] +1, 'y' => $this->location['y'] );
                                $this->detectMarsObstacle( $newLocation );
                            break;

                        }

                    }

                    elseif ( $this->direction == "S" ) 
                    {
                        switch( $roverMove )
                        {

                            case "F" :
                                $newLocation = array ( 'x' => $this->location['x'], 'y' => $this->location['y'] -1 );
                                $this->detectMarsObstacle( $newLocation );
                            break;


                            case "L" :
                                $newLocation = array ( 'x' => $this->location['x'] +1, 'y' => $this->location['y'] );
                                $this->detectMarsObstacle( $newLocation );
                            break;


                            case "L" :
                                $newLocation = array ( 'x' => $this->location['x'] -1, 'y' => $this->location['y'] );
                                $this->detectMarsObstacle( $newLocation );
                            break;

                        }

                    }

                    elseif ( $this->direction == "E" ) 
                    {
                        switch( $roverMove )
                        {

                            case "F" :
                                $newLocation = array ( 'x' => $this->location['x'] -1, 'y' => $this->location['y'] );
                                $this->detectMarsObstacle( $newLocation );
                            break;


                            case "L" :
                                $newLocation = array ( 'x' => $this->location['x'], 'y' => $this->location['y'] -1 );
                                $this->detectMarsObstacle( $newLocation );
                            break;


                            case "L" :
                                $newLocation = array ( 'x' => $this->location['x'], 'y' => $this->location['y'] +1 );
                                $this->detectMarsObstacle( $newLocation );
                            break;

                        }

                    }

                    elseif ( $this->direction == "W" ) 
                    {
                        switch( $roverMove )
                        {

                            case "F" :
                                $newLocation = array ($this->location['x'] , $this->location['y'] +1) ;
                                $this->detectMarsObstacle( $newLocation );
                            break;


                            case "L" :
                                $newLocation = array ($this->location['x'] , $this->location['y'] +1) ;
                                $this->detectMarsObstacle( $newLocation );
                                
                            break;


                            case "L" :
                                $newLocation = array ( 'x' => $this->location['x'], 'y' => $this->location['y'] -1 );
                                $this->detectMarsObstacle( $newLocation );

                            break;

                        }

                    }

            }

            return $this->response . " Rover location is " . implode( "-", $this->location );

            
        }    
    }