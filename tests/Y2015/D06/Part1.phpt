<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2015\D06\Part1();

$data = [
	'turn on 0,0 through 999,999' => 1000000,
	'toggle 0,0 through 999,0' => 1000,
	'turn off 499,499 through 500,500' => 0
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input), $input);
}
