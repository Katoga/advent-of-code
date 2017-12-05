<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

$solver = new AdventOfCode\Lib\Day10\Part1();

$data = [
	'1' => 11,
	'11' => 21,
	'21' => 1211,
	'1211' => 111221,
	'111221' => 312211
];
$data = [
	'1' => [
		1 => '11',
		2 => '21',
		3 => '1211',
		4 => '111221',
		5 => '312211',
		6 => '13112221',
		7 => '1113213211'
	]
];

foreach ($data as $input => $inputData) {
	foreach ($inputData as $iterations => $expected) {
		$solver->setIterations($iterations);
		Assert::equal(strlen($expected), $solver->getSolution((string) $input));
	}
}
