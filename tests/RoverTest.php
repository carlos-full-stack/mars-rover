<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Faker\Factory;
use Rover\Rover;

final class RoverTest extends TestCase
{

    protected $rover;
    protected $location;
    protected $direction;

    protected function setUp(): void
    {
        $faker = Factory::create();
        $this->rover = new Rover( $faker->text(5), $location = array( 
            'x' => $faker->numberBetween(0, 3), 
            'y' => $faker->numberBetween(0, 5) ),
            null );
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


}




