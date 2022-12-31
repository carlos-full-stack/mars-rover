<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Faker\Factory;
use Rover\Rover;

require("../vendor/autoload.php");

final class RoverTest extends TestCase
{

    public function testRoverClassCanBeInstantiable(): void
    {
        $faker = Factory::create();
        $roverTest = new Rover( $faker->text(5), $location = array( 'x' => $faker->numberBetween(0, 25), 'y' => $faker->numberBetween(0, 25) ), $faker->randomElement( ['F', 'L', 'R'] ) );

        $this->assertInstanceOf( Rover::class, $roverTest );
    }
}




