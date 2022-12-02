<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D09;

use RuntimeException;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	/**
	 *
	 * @param array<int> $distances
	 * @return int
	 */
	protected function getResult(array $distances): int
	{
		$max = max($distances);
		if ($max === false) {
			throw new RuntimeException('Failed to get maximum.');
		}

		return $max;
	}
}
