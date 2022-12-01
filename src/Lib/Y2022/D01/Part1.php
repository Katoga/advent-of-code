<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D01;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-01
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$rows = explode(PHP_EOL, $input);

		$sums = [];
		$i = 0;

		foreach ($rows as $row) {
			if (!array_key_exists($i, $sums)) {
				$sums[$i] = 0;
			}

			if ($row === '') {
				$i++;
				continue;
			}

			$sums[$i] += $row;
		}

		return max($sums);
	}
}
