<?php

use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

$solver = new AdventOfCode\Lib\Day12\Part1();

$data = [
	'[1,2,3]' => 6,
	'{"a":2,"b":4}' => 6,
	'[[[3]]]' => 3,
	'{"a":{"b":4},"c":-1}' => 3,
	'{"a":[-1,1]}' => 0,
	'[-1,{"a":1}]' => 0,
	'[]' => 0,
	'{}' => 0
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
