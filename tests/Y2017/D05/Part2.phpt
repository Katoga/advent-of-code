<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2017\D05\Part2();

$input = '0
3
0
1
-3
';

$expected = 10;

Assert::equal($expected, $solver->getSolution($input));
