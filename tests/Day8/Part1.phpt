<?php

use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

$solver = new AdventOfCode\Lib\Day8\Part1();

$data = [
<<<'EOI'
""
"abc"
"aaa\"aaa"
"\x27"
EOI
	=> 12,
	<<<'EOI2'
"\x5a\x4e"
EOI2
	=> 8,
	<<<'EOI3'
"\\"
EOI3
	=> 3,
	<<<'EOI3'
"\\"
"\"\\"
EOI3
	=> 7,
	<<<'EOI4'
"kwdlysf\\xjpelae"
EOI4
	=> 3
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}