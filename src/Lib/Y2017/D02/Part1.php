<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D02;

use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-07
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 * @param array<int, string> $numbers
	 * @return int
	 */
	protected function getRowResult(array $numbers): int
	{
		$max = max($numbers);
		$min = min($numbers);

		if ($max === false || $min === false) {
			throw new RuntimeException('Failed to get extremes.');
		}

		return (int) $max - (int) $min;
	}
}
