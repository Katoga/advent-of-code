<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2017\D04\Part1();

$input = 'aa bb cc dd ee
aa bb cc dd aa
aa bb cc dd aaa';

$expected = 2;

Assert::equal($expected, $solver->getSolution($input));
