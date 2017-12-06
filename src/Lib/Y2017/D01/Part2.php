<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D01;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	/**
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$sum = 0;

		$len = strlen($input);
		$jump = $len / 2;

		$input .= $input;

		for ($i = 0; $i < $len; $i++) {
			$current = substr($input, $i, 1);
			$next = substr($input, $i + $jump, 1);
			if ($current == $next) {
				$sum += $current;
			}
		}

		return $sum;
	}
}
