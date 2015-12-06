<?php

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Day1\Part2\Solver();

$data = [
	')' => 1,
	')(()()))' => 1,
	'()())' => 5,
	'((((())))))' => 11,
	'((' => 0
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getStep($input));
}
