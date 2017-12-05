<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day12;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-15
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{

	/**
	 *
	 * @param array $array
	 * @return int
	 */
	protected function sum(array $array): int
	{
		$sum = 0;
		foreach ($array as $item) {
			if (is_array($item)) {
				$sum += $this->sum($item);
			} elseif (is_int($item) || is_numeric($item)) {
				$sum += $item;
			}
		}

		return $sum;
	}
}
