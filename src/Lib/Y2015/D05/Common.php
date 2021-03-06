<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D05;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-11
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$cnt = 0;

		$words = explode(PHP_EOL, $input);

		foreach ($words as $word) {
			if ($this->isNiceWord($word)) {
				$cnt++;
			}
		}

		return $cnt;
	}

	/**
	 *
	 * @param string $word
	 * @return bool
	 */
	abstract protected function isNiceWord(string $word): bool;
}
