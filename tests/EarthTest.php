<?php declare(strict_types=1);

use Earth\Earth;
use PHPUnit\Framework\TestCase;
use Faker\Factory;

require("../vendor/autoload.php");

final class EarthTest extends TestCase
{
    public function testOnlyAllowedCommandsAreSent(): void
    {
        $newEarth = new Earth();
        $this->assertInstanceOf( Earth::class, $newEarth );

        $faker = Factory::create();
        $response = $newEarth->sendCommandRover( $faker->randomElement( ['F', 'L', 'R'] ) );
        $this->assertStringStartsWith(" Rover location is", $response );

    }

    public function testNotAllowedCommandsAreNotSent(): void
    {

        $faker = Factory::create();

        for ($i = 0; $i < 6; $i++) 
        {
            $wrongCommand = $faker->bothify("#");
            if ( $wrongCommand != "F" || "L" || "R" );
            $collection =+ $wrongCommand;
     
        }

        $newEarth = new Earth();
        $response = $newEarth->sendCommandRover( $collection );
        $this->assertStringStartsWith( "Please introduce a valid collection", $response );

    }


}




