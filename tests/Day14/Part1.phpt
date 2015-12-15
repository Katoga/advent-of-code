<?php

use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

$solver = new AdventOfCode\Lib\Day14\Part1();

$data = [
	<<<'E'
Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.
Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.
E
	=> [
		1 => 16,
		10 => 160,
		11 => 176,
		1000 => 1120
	]
];

foreach ($data as $input => $inputData) {
	foreach ($inputData as $seconds => $expected) {
		$solver->setDuration($seconds);
		Assert::equal($expected, $solver->getSolution($input));
	}
}
