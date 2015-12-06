<?php

use AdventOfCode\Day1\Part2\Solver;

require_once __DIR__ . '/../../bootstrap.php';

$input = file_get_contents(__DIR__ . '/../input.txt');

$solver = new Solver();
$solution = $solver->getStep($input);

var_dump($solution);
