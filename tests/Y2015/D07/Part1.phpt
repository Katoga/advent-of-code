<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$input = <<<'EOI'
123 -> x
456 -> y
x AND y -> d
x OR y -> e
x LSHIFT 2 -> f
y RSHIFT 2 -> g
NOT x -> h
NOT y -> i
EOI;

$expected = [
	'd' => 72,
	'e' => 507,
	'f' => 492,
	'g' => 114,
	'h' => 65412,
	'i' => 65079,
	'x' => 123,
	'y' => 456
];

foreach ($expected as $wire => $signal) {
	$solver = new AdventOfCode\Lib\Y2015\D07\Part1();
	$solver->setOutputWire($wire);
	Assert::equal($signal, $solver->getSolution($input));
}
