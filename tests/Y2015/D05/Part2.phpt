<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2015\D05\Part2();

$data = [
	'qjhvhtzxzqqjkmpb' => 1,
	'xxyxx' => 1,
	'uurcxstgmygtbstg' => 0,
	'ieodomkazucvgmuy' => 0
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input), $input);
}
