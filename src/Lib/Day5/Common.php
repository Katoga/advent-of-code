<?php
namespace AdventOfCode\Lib\Day5;

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
	public function getSolution($input)
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
	abstract protected function isNiceWord($word);
}
