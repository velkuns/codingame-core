# codingame-core
Codingame - Core library
Can be used to start new "Game" (challenge, puzzle...) on Codingame.com

This library provide some utilities, like a logger, timer, I/O
Will also provide Application / Game base to write a beautiful code !

## Installation
Create new project from http://github.com/velkuns/codingame-template


## Core Main
### Application
`Application`: Main class to run Codingame application.
New to have `GameInterface` instance in constructor


### Game\*
`GameInterface`: Must be implemented in your project.
`GameAction`: Use to store game action output write at the end of the turn.

### IO\*
`Input`: Stateless class to read an input in given format, and return array
`Output`: Stateless class to write an output (std output).

### Logger\*
`Logger`: Stateless class to log content on codingame debug output

## Core Compiler
Codingame can only take a single file on his editor.
So, we need to "compile" all sources files into one file to submit on
Codingame.

An compiler executable file is provided in template project.
You can configure some options to scan sources to "compile".


## Core Utils
### Collection
`Abstract Collection`: Provide an abstract class for complex collection.

### Math\*
`Math`: Provide some function about basic math (ie factorial number)
`Permutation`: Provide a method to get a permuted array based on a seed number.
(Seed number must be between 0 <= n < max permutation)

### Utils\*
`Number`: Format number
`Timer`: Use to start / display timer in your app.
