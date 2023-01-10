<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Faker\Factory;
use Mars\Mars;
use Rover\Rover;

final class RoverTest extends TestCase
{

    protected $rover;
    protected $location;
    protected $direction;
    protected $mars;
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
        $this->rover = new Rover( $this->faker->text(5), $location = array( 
            'x' => 5, 
            'y' => 5 ),
            null );

        $this->mars = new Mars();
    }


    public function directionsProvider() :array
    {

        return [
            [ "F", "N", 5, 6],
            [ "L", "N", 4, 5],
            [ "R", "N", 6, 5],

            [ "F", "S", 5, 4],
            [ "L", "S", 6, 5],
            [ "R", "S", 4, 5],

            [ "F", "E", 6, 5],
            [ "L", "E", 5, 6],
            [ "R", "E", 5, 4],

            [ "F", "W", 4, 5],
            [ "L", "W", 5, 4],
            [ "R", "W", 5, 6],

            ];
    }


      /**
     * @dataProvider directionsProvider
     */

    public function test_Commands_Move_Rover_As_Expected( $command, $direction,  $expectedX, $expectedY ) : void
    {
        $this->rover->direction = $direction;
        $expectedLocation = array( 'x' => ( $expectedX ), 'y' => ( $expectedY ));
        $this->rover->moveRover( $command );

        $this->assertSame( $expectedLocation, $this->rover->location );

    }



    public function test_Rover_Do_Not_Moves_To_Location_When_Finds_Obstacle_At_X_Plus_One() : void
    {
        $this->rover->location = array( 
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] -1);

        $this->rover->detectMarsObstacle( array(
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] ));

        $this->assertNotSame( $this->rover->location['x'], $this->mars->obstacle['x'] );


    }


    public function test_Rover_Do_Not_Moves_To_Location_When_Finds_Obstacle_At_X_Minus_One() : void
    {
        $this->rover->location = array( 
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] +1);

        $this->rover->detectMarsObstacle( array(
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] ));

        $this->assertNotSame( $this->rover->location['x'], $this->mars->obstacle['x'] );


    }


    public function test_Rover_Confirm_Location_When_Does_Not_Find_Obstacles_At_X_Plus_One() : void
    {

         $initialLocation = $this->rover->location;

         $newLocation = array( 
            'y' => $this->rover->location['y'], 
            'x' => $this->rover->location['x'] + 1 );

        $this->rover->detectMarsObstacle( array(
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] ));

        $this->assertSame( $newLocation['x'], $initialLocation['x'] + 1 );


    }


    public function test_Rover_Confirm_Location_When_Does_Not_Find_Obstacles_At_X_Minus_One() : void
    {

         $initialLocation = $this->rover->location;

         $newLocation = array( 
            'y' => $this->rover->location['y'], 
            'x' => $this->rover->location['x'] -1 );

        $this->rover->detectMarsObstacle( array(
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] ));

        $this->assertSame( $newLocation['x'], $initialLocation['x'] - 1 );


    }


    public function test_Rover_Do_Not_Moves_To_Location_When_Finds_Obstacle_At_Y_Plus_One() : void
    {
        $this->rover->location = array( 
            'y' => $this->mars->obstacle['y'] -1 , 
            'x' => $this->mars->obstacle['x']);

        $this->rover->detectMarsObstacle( array(
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] ));

        $this->assertNotSame( $this->rover->location['y'], $this->mars->obstacle['y'] );


    }


    public function test_Rover_Do_Not_Moves_To_Location_When_Finds_Obstacle_At_Y_Minus_One() : void
    {
        $this->rover->location = array( 
            'y' => $this->mars->obstacle['y'] +1 , 
            'x' => $this->mars->obstacle['x']);

        $this->rover->detectMarsObstacle( array(
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] ));

        $this->assertNotSame( $this->rover->location['y'], $this->mars->obstacle['y'] );


    }


    public function test_Rover_Confirm_Location_When_Does_Not_Find_Obstacles_At_Y_Plus_One() : void
    {

         $initialLocation = $this->rover->location;

         $newLocation = array( 
            'y' => $this->rover->location['y'] +1, 
            'x' => $this->rover->location['x'] );

        $this->rover->detectMarsObstacle( array(
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] ));

        $this->assertSame( $newLocation['y'], $initialLocation['y'] +1 );


    }


    public function test_Rover_Confirm_Location_When_Does_Not_Find_Obstacles_At_Y_Minus_One() : void
    {

         $initialLocation = $this->rover->location;

         $newLocation = array( 
            'y' => $this->rover->location['y'] -1, 
            'x' => $this->rover->location['x']);

        $this->rover->detectMarsObstacle( array(
            'y' => $this->mars->obstacle['y'] , 
            'x' => $this->mars->obstacle['x'] ));

        $this->assertSame( $newLocation['y'], $initialLocation['y'] -1 );


    }

}