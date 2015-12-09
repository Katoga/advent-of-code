<?php

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Day5\Part1();

$data = [
	'ugknbfddgicrmopn' => 1,
	'aaa' => 1,
	'dvszwmarrgswjxmb' => 0,
	'jchzalrnumimnmhp' => 0,
	'haegwjzuvuyypxyu' => 0,
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input), $input);
}
