<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
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
        $this->rover = new Rover( "Curiosity", $location = array( 
            'x' => 5, 
            'y' => 5 ),
            null );
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


    public function obstaclePreLocationsProvider() :array
    {

        return [
            [ 6, 5, "F", "N"],
            [ 5, 6, "L", "N"],

            [ 6, 7, "F", "S"],
            [ 7, 6, "L", "S"],


            ];
    }



    public function areaPreLimitsProvider() :array
    {

        return [
            [ 24, 24, "F", "N"],
            [ 24, 24, "R", "N"],

            ];
    }


      /**
     * @dataProvider directionsProvider
     */

    public function test_Commands_Move_Rover_As_Expected( $command, $direction, $expectedX, $expectedY ) : void
    {
        $this->rover->direction = $direction;
        $expectedLocation = array( 'x' => ( $expectedX ), 'y' => ( $expectedY ));
        $this->rover->moveRover( $command );

        $this->assertSame( $expectedLocation, $this->rover->location );

    }

    /**
     * @dataProvider obstaclePreLocationsProvider
     */



    public function test_Rover_Can_Not_Move_To_Obstacle_Location ( $locationX, $locationY, $command, $direction ) : void
    {
        $marsVars = get_class_vars(Mars::class);
        $this->rover->location = array( 'x' => ( $locationX ), 'y' => ( $locationY ));
        $this->rover->direction = $direction;
        $this->rover->moveRover( $command );

        $this->assertNotSame( $this->rover->location, $marsVars['obstacle'] );

}

    /**
     * @dataProvider areaPreLimitsProvider
     */


public function test_Rover_Can_Not_Move_Outside_Mars_Area ( $locationX, $locationY, $command, $direction ) : void
{
    $marsVars = get_class_vars( Mars::class );
    $this->rover->location = array( 'x' => ( $locationX ), 'y' => ( $locationY ));
    $this->rover->direction = $direction;
    $this->rover->moveRover( $command );

    $this->assertTrue( ( $this->rover->location['x'] < 25 ) && ( $this->rover->location['y'] < 25 ) );

}



}