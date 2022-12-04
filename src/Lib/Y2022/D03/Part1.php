<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D03;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-04
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	public function getSolution(string $input): int
	{
		$sumOfPriorities = 0;

		$charPriorities = array_combine(range('a', 'z'), range(1, 26)) + array_combine(range('A', 'Z'), range(27, 52));

		$rucksacks = explode(PHP_EOL, $input);
		foreach ($rucksacks as $rucksack) {
			if ($rucksack) {
					/**
				 * @var int<1, max> $rucksackLenght
				 */
				$rucksackLenght = (int) (strlen($rucksack) / 2);
				list($first, $second) = str_split($rucksack, $rucksackLenght);
				$inBothCompartments = implode(array_unique(array_intersect(str_split($first), str_split($second))));
				$sumOfPriorities += $charPriorities[$inBothCompartments];
			}
		}

		return $sumOfPriorities;
	}
}
