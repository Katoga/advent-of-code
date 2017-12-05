<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2015\D08\Part2();

$data = [
	<<<'EOI'
""
EOI
	=> 6 - 2,
	<<<'EOI'
"abc"
EOI
	=> 9 - 5,
	<<<'EOI'
"aaa\"aaa"
EOI
	=> 16 - 10,
	<<<'EOI'
"\x27"
EOI
	=> 11 - 6,
	<<<'EOI'
""
"abc"
"aaa\"aaa"
"\x27"
EOI
	=> 42 - 23,
	<<<'EOI2'
"\x5a\x4e"
EOI2
	=> 16 - 10,
	<<<'EOI3'
"\\"
EOI3
	=> 10 - 4,
	<<<'EOI3'
"\\"
"\"\\"
EOI3
	=> 24 - 10,
	<<<'EOI4'
"kwdlysf\\xjpelae"
EOI4
	=> 24 - 18,
	<<<'EOI4'
"yjafhbvhhj\x1b\"bplb"
EOI4
	=> 29 - 22,
	<<<'EOI5'
"tzckolphexfq\\\x23\xfbdqv\\\"m"
EOI5
	=> 44 - 32,
	<<<'EOI6'
"xbzsuihs\x4dcedy\xaclrhgii\\\""
EOI6
	=> 42 - 32
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution($input));
}
