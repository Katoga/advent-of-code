<?php

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Day4\Part1\Solver();

$data = [
	'abcdef' => 609043,
	'pqrstuv' => 1048970
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
