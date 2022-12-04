<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D03;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-04
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	private const GROUP_SIZE = 3;

	public function getSolution(string $input): int
	{
		$sumOfPriorities = 0;

		$charPriorities = $this->getCharPriorities();

		$rucksacks = explode(PHP_EOL, $input);

		$groups = array_chunk($rucksacks, self::GROUP_SIZE);
		foreach ($groups as $group) {
			if (count($group) === 3) {
				$inEveryRucksack = implode(
					array_unique(
						array_intersect(
							str_split($group[0]),
							str_split($group[1]),
							str_split($group[2])
						)
					)
				);
				$sumOfPriorities += $charPriorities[$inEveryRucksack];
			}
		}

		return $sumOfPriorities;
	}
}
