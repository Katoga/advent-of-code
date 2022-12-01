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
	protected function getSums(string $input): array
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

		return $sums;
	}
}
