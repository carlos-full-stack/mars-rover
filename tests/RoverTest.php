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
            'x' => $this->faker->numberBetween(5, 10), 
            'y' => $this->faker->numberBetween(5, 10) ),
            null );

        $this->mars = new Mars();
    }


    public function test_F_Command_And_N_Direction_Results_In_Y_Plus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "N";
        $this->rover->moveRover( "F" );

        $this->assertSame( $this->rover->location['y'], $initialLocation['y'] +1);

    }


    public function test_L_Command_And_N_Direction_Results_In_X_Minus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "N";
        $this->rover->moveRover( "L" );

        $this->assertSame( $this->rover->location['x'], $initialLocation['x'] -1);

    }


    public function test_R_Command_And_N_Direction_Results_In_X_Plus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "N";
        $this->rover->moveRover( "R" );

        $this->assertSame( $this->rover->location['x'], $initialLocation['x'] +1);


    }


    public function test_F_Command_And_S_Direction_Results_In_Y_Minus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "S";
        $this->rover->moveRover( "F" );

        $this->assertSame( $this->rover->location['y'], $initialLocation['y'] -1);

    }


    public function test_L_Command_And_S_Direction_Results_In_X_Minus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "S";
        $this->rover->moveRover( "L" );

        $this->assertSame( $this->rover->location['x'], $initialLocation['x'] +1);

    }


    public function test_R_Command_And_S_Direction_Results_In_X_Plus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "S";
        $this->rover->moveRover( "R" );

        $this->assertSame( $this->rover->location['x'], $initialLocation['x'] -1);


    }


    public function test_F_Command_And_E_Direction_Results_In_X_Plus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "E";
        $this->rover->moveRover( "F" );

        $this->assertSame( $this->rover->location['x'], $initialLocation['x'] +1);

    }


    public function test_L_Command_And_E_Direction_Results_In_Y_Plus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "E";
        $this->rover->moveRover( "L" );

        $this->assertSame( $this->rover->location['y'], $initialLocation['y'] +1);

    }


    public function test_R_Command_And_E_Direction_Results_In_Y_Minus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "E";
        $this->rover->moveRover( "R" );

        $this->assertSame( $this->rover->location['y'], $initialLocation['y'] -1);


    }


    public function test_F_Command_And_W_Direction_Results_In_X_Minus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "W";
        $this->rover->moveRover( "F" );

        $this->assertSame( $this->rover->location['x'], $initialLocation['x'] -1);

    }


    public function test_L_Command_And_W_Direction_Results_In_Y_Minus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "W";
        $this->rover->moveRover( "L" );

        $this->assertSame( $this->rover->location['y'], $initialLocation['y'] -1);

    }


    public function test_R_Command_And_W_Direction_Results_In_Y_Plus_One() : void
    {

        $initialLocation = $this->rover->location;

        $this->rover->direction = "W";
        $this->rover->moveRover( "R" );

        $this->assertSame( $this->rover->location['y'], $initialLocation['y'] +1);


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