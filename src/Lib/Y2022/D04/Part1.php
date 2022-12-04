<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D04;

use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-04
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	public function getSolution(string $input): int
	{
		$overlappingPairsCnt = 0;

		$pairs = explode(PHP_EOL, $input);

		foreach ($pairs as $pair) {
			if ($pair) {
				$pair = explode(',', $pair);
				sort($pair);
				/** @var string $range */
				foreach ($pair as $key => $range) {
					$pair[$key] = explode('-', $range);
				}

				if ((
						$pair[0][0] >= $pair[1][0] && $pair[0][1] <= $pair[1][1]
					) || (
						$pair[1][0] >= $pair[0][0] && $pair[1][1] <= $pair[0][1]
				)) {
					$overlappingPairsCnt++;
				}
			}
		}

		return $overlappingPairsCnt;
	}
}
