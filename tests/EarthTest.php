<?php declare(strict_types=1);

use Earth\Earth;
use PHPUnit\Framework\TestCase;
use Faker\Factory;


final class EarthTest extends TestCase
{

    protected $faker;
    protected $earth;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
        $this->earth = new Earth();
    }


    public function testOnlyAllowedCommandsAreSent(): void
    {
        $this->assertInstanceOf( Earth::class, $this->earth );

        $response = $this->earth->sendCommandRover( $this->faker->randomElement( ['F', 'L', 'R'] ) );
        $this->assertStringStartsWith(" Rover location is", $response );

    }

    public function testNotAllowedCommandsAreNotSent(): void
    {

        for ($i = 0; $i < 6; $i++) 
        {
            $wrongCommand = $this->faker->bothify("#");
            if ( $wrongCommand != "F" || "L" || "R" );
            $collection =+ $wrongCommand;
     
        }

        $response = $this->earth->sendCommandRover( $collection );
        $this->assertStringStartsWith( "Please introduce a valid collection", $response );

    }

    public function testShowsErrorWhenSendsCommandsWithoutCollection(): void
    {

        $response = $this->earth->sendCommandRover( null );
        $this->assertStringStartsWith( "ERROR. Commands collection cannot be empty", $response );

    }


}