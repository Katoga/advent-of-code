<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2017\D02\Part2();

$input = '5	9	2	8
9	4	7	3
3	8	6	5';

$expected = 9;

Assert::equal($expected, $solver->getSolution($input));
