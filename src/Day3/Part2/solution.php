<?php

use AdventOfCode\Day3\Part2\Solver;

require_once __DIR__ . '/../../bootstrap.php';

$input = file_get_contents(__DIR__ . '/../input.txt');

$solver = new Solver();
$solution = $solver->getSolution($input);

var_dump($solution);
