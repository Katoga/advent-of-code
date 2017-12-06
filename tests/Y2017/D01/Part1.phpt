<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2017\D01\Part1();

$data = [
  '1122' => 3,
  '1111' => 4,
  '1234' => 0,
  '91212129' => 9
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution((string) $input));
}
