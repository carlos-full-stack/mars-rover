<?php declare(strict_types=1);

use Earth\Earth;
use PHPUnit\Framework\TestCase;
use Rover\Rover;

require("../vendor/autoload.php");

final class EarthTest extends TestCase
{
    public function testOnlyAllowedCommandsAreSent(): void
    {
        $newEarth = new Earth();
    
        $this->assertInstanceOf( Earth::class, $newEarth );

        $response = $newEarth->sendCommandRover( "FLR" );

        $this->assertStringStartsWith(" Rover location is", $response );

    }

    public function testNotAllowedCommandsAreNotSent(): void
    {
        $newEarth = new Earth();

        $response = $newEarth->sendCommandRover( "FLR" );

        $this->assertStringStartsWith(" Rover location is", $response );

    }


}




