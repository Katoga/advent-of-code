<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2015\D03\Part1();

$data = [
	'>' => 2,
	'^>v<' => 4,
	'^v^v^v^v^v' => 2,
	'>>>>>' => 6,
	'' => 1
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
