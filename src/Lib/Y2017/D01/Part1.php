<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D01;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$sum = 0;

		for ($i = 0; $i < strlen($input) - 1; $i++) {
			$current = substr($input, $i, 1);
			$next = substr($input, $i + 1, 1);
			if ($current == $next) {
				$sum += $current;
			}
		}

		if (substr($input, 0, 1) == substr($input, -1)) {
			$sum += substr($input, 0, 1);
		}

		return $sum;
	}
}
