<?php

use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

$solver = new AdventOfCode\Lib\Day1\Part2();

$data = [
	')' => 1,
	')(()()))' => 1,
	'()())' => 5,
	'((((())))))' => 11,
	'((' => 0
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
