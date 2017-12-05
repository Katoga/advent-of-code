<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

$solver = new AdventOfCode\Lib\Day2\Part2();

$data = [
	'2x3x4' => 34,
	'1x1x10' => 14
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
