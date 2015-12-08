<?php
namespace AdventOfCode\Lib\Day1;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 implements SolverInterface
{
	const FLOOR_UP = '(';

	const FLOOR_DOWN = ')';

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$up = substr_count($input, self::FLOOR_UP);
		$down = substr_count($input, self::FLOOR_DOWN);

		return ($up - $down);
	}
}
