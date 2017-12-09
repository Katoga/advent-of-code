<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2017\D02\Part1();

$input = '5	1	9	5
7	5	3
2	4	6	8';

$expected = 18;

Assert::equal($expected, $solver->getSolution($input));
