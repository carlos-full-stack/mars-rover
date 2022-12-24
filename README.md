# Mars Rover Mission 


## Your task
You're part of the team that explores Mars by sending remotely controlled vehicles to the surface of the planet. Develop a software that translates the commands sent from earth to instructions thar are understood by the rover.


## Requirements
- You are given the initial starting point (x,y) of a rover and the direction (N,S,E,W) it is facing.
- The rover receives a collection of commands (E.g.) FFRRFFFRL
- The rover can move forward (f).
- The rover can move left (l).
- The rover can move right (r ).
- Suppose we are on a really weird planet that is square.
- Implement obstacle detection before each move to a new square. If a given sequence of commands encounters an obstacle, the rover moves up to the last possible point, aborts the sequence and reports the obstacle.

## Take into account
- Rovers are expensive. Make sure the software works as expected.
