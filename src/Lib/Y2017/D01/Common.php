<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D01;

use AdventOfCode\Lib\SolverInterface;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	protected function getSum(string $input, int $length, int $jump): int
	{
		$sum = 0;

		for ($i = 0; $i < $length; $i++) {
			$current = substr($input, $i, 1);
			$next = substr($input, $i + $jump, 1);
			if ($current == $next) {
				$sum += $current;
			}
		}

		return $sum;
	}
}
