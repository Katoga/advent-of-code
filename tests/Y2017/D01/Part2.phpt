<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2017\D01\Part2();

$data = [
  '1212' => 6,
  '1221' => 0,
  '123425' => 4,
  '123123' => 12,
  '12131415' => 4
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution((string) $input));
}
