<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D04;

use AdventOfCode\Lib\SolverInterface;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-04
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	public function getSolution(string $input): int
	{
		$overlappingPairsCnt = 0;

		$pairs = explode(PHP_EOL, $input);

		foreach ($pairs as $pair) {
			if ($pair) {
				$pair = explode(',', $pair);
				sort($pair, SORT_NATURAL);
				/** @var string $range */
				foreach ($pair as $key => $range) {
					$pair[$key] = explode('-', $range);
				}

				if ($this->isOverlapping($pair)) {
					$overlappingPairsCnt++;
				}
			}
		}

		return $overlappingPairsCnt;
	}

	/**
	 * @param array<int, array<int, string>|string> $pair
	 * @return bool
	 */
	abstract protected function isOverlapping(array $pair): bool;
}
