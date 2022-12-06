<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2022\D06\Part1();

$data = [
	'mjqjpqmgbljsphdztnvjfqwrcgsmlb' => 7,
	'bvwbjplbgvbhsrlpgdmjqwftvncz' => 5,
	'nppdvjthqldpwncqszvftbrmjlhg' => 6,
	'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg' => 10,
	'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw' => 11,
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution((string) $input));
}
