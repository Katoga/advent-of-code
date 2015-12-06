<?php

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Day1\Part1\Solver();

$data = [
	'(())' => 0,
	'()()' => 0,
	'(((' => 3,
	'(()(()(' => 3,
	'))((((('  => 3,
	'())' => -1,
	'))(' => -1,
	')))' => -3,
	')())())' => -3
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getFloor($input));
}
