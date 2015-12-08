<?php
namespace AdventOfCode\Lib\Day1;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 implements SolverInterface
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
		$floor = 0;
		$chars = str_split($input);
		$basement = false;

		foreach ($chars as $index => $char) {
			switch ($char) {
				case self::FLOOR_UP:
					$floor++;
					break;
				case self::FLOOR_DOWN:
					$floor--;
					break;
			}

			if ($floor < 0) {
				$basement = true;
				break;
			}
		}

		if ($basement) {
			$step = $index + 1;
		} else {
			$step = 0;
		}


		return $step;
	}
}
