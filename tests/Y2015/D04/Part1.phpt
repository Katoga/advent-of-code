<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2015\D04\Part1();

$data = [
	'abcdef' => 609043,
	'pqrstuv' => 1048970
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
