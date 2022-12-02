<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2022\D02\Part2();

$data = [
<<<'EOI'
A Y
B X
C Z
EOI
  => 12,
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution((string) $input));
}
