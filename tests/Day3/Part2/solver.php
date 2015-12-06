<?php

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Day3\Part2\Solver();

$data = [
	'^v' => 3,
	'^>v<' => 3,
	'^v^v^v^v^v' => 11,
	'' => 1,
	'>' => 2
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
