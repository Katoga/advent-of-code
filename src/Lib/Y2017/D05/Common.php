<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D05;

use AdventOfCode\Lib\SolverInterface;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	/**
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$steps = 0;

		$rows = explode(PHP_EOL, trim($input));
		$position = 0;
		$lastPosition = count($rows) - 1;

		do {
			$oldPosition = $position;

			$position += $rows[$position];

			$rows[$oldPosition] += $this->getChange((int) $rows[$oldPosition]);

			$steps++;
		} while ($position >= 0 && $position <= $lastPosition);
		return $steps;
	}

	/**
	 * @param int $offset
	 * @return int
	 */
	abstract protected function getChange(int $offset): int;
}
