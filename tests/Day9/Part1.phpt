<?php

use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

$solver = new AdventOfCode\Lib\Day9\Part1();

$data = [
	<<<'EOI'
London to Dublin = 464
London to Belfast = 518
Dublin to Belfast = 141
EOI
	=> 605
];

/*
Dublin -> London -> Belfast = 982
London -> Dublin -> Belfast = 605
London -> Belfast -> Dublin = 659
Dublin -> Belfast -> London = 659
Belfast -> Dublin -> London = 605
Belfast -> London -> Dublin = 982
*/

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
