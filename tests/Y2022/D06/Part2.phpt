<?php
declare(strict_types=1);

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

$solver = new AdventOfCode\Lib\Y2022\D06\Part2();

$data = [
	'mjqjpqmgbljsphdztnvjfqwrcgsmlb' => 19,
	'bvwbjplbgvbhsrlpgdmjqwftvncz' => 23,
	'nppdvjthqldpwncqszvftbrmjlhg' => 23,
	'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg' => 29,
	'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw' => 26,
];

foreach ($data as $input => $expected) {
	Assert::equal($expected, $solver->getSolution((string) $input));
}
