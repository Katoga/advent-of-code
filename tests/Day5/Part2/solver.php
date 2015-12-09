<?php

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Day5\Part2();

$data = [
	'qjhvhtzxzqqjkmpb' => 1,
	'xxyxx' => 1,
	'uurcxstgmygtbstg' => 0,
	'ieodomkazucvgmuy' => 0
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input), $input);
}
