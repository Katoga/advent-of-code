<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2022\D01\Part1();

$data = [
<<<'EOI'
1000
2000
3000

4000

5000
6000

7000
8000
9000

10000
EOI
  => 24000,
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution((string) $input));
}
