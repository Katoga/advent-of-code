<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2015\D06\Part2();

$data = [
	'turn on 0,0 through 0,0' => 1,
	'toggle 0,0 through 0,0' => 2,
	'toggle 0,0 through 9,9' => 200,
	'toggle 0,0 through 999,999' => 2000000
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input), $input);
}
