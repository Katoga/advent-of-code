<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2015\D01\Part1();

$data = [
	'(())' => 0,
	'()()' => 0,
	'(((' => 3,
	'(()(()(' => 3,
	'))((((('  => 3,
	'())' => -1,
	'))(' => -1,
	')))' => -3,
	')())())' => -3
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
