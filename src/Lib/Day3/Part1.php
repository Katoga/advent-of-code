<?php
namespace AdventOfCode\Lib\Day3;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 implements SolverInterface
{
	const STEP_NORTH = '^';
	const STEP_SOUTH = 'v';
	const STEP_EAST = '>';
	const STEP_WEST = '<';

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		// start at 0~0
		$posX = 0;
		$posY = 0;
		$visited = [
			sprintf('%d~%d', $posX, $posY) => true
		];

		$steps = str_split($input);
		foreach ($steps as $step) {
			switch ($step) {
				case self::STEP_NORTH:
					$posY++;
					break;
				case self::STEP_SOUTH:
					$posY--;
					break;
				case self::STEP_EAST:
					$posX++;
					break;
				case self::STEP_WEST:
					$posX--;
					break;
			}
			$visited[sprintf('%d~%d', $posX, $posY)] = true;
		}

		return count($visited);
	}
}
