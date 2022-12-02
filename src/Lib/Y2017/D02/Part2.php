<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D02;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-07
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	/**
	 * @param array<int, string> $numbers
	 * @return int
	 */
	protected function getRowResult(array $numbers): int
	{
		$result = 0;

		rsort($numbers, SORT_NUMERIC);
		$length = count($numbers);
		for ($i = 0; $i <= $length; $i++) {
			$dividend = (int) $numbers[$i];

			for ($j = $i + 1; $j < $length; $j++) {
				$divisor = (int) $numbers[$j];

				if (($dividend % $divisor) == 0) {
					$result = ($dividend / $divisor);
					break 2;
				}
			}
		}

		return $result;
	}
}
