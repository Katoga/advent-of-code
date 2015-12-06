<?php

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Day2\Part2\Solver();

$data = [
	'2x3x4' => 34,
	'1x1x10' => 14
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}