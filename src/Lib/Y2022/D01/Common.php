<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D01;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-01
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	/**
	 * @param string $input
	 * @return array<int>
	 */
	protected function getSums(string $input): array
	{
		$rows = explode(PHP_EOL, $input);

		$sums = [];
		$idx = 0;

		foreach ($rows as $row) {
			if (!array_key_exists($idx, $sums)) {
				$sums[$idx] = 0;
			}

			if ($row === '') {
				$idx++;
				continue;
			}

			$sums[$idx] += $row;
		}

		return $sums;
	}
}
