<?php
namespace AdventOfCode\Day3\Part2;

use AdventOfCode\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Solver implements SolverInterface
{
	const STEP_NORTH = '^';
	const STEP_SOUTH = 'v';
	const STEP_EAST = '>';
	const STEP_WEST = '<';

	const SANTA = true;
	const ROBOT = false;

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		// start at 0~0
		$posX = [
			self::SANTA => 0,
			self::ROBOT => 0
		];
		$posY = [
			self::SANTA => 0,
			self::ROBOT => 0
		];
		$visited = [
			sprintf('%d~%d', $posX[(int) self::SANTA], $posY[(int) self::SANTA]) => true
		];
		$visited = [
			sprintf('%d~%d', $posX[(int) self::ROBOT], $posY[(int) self::ROBOT]) => true
		];

		$moving = self::SANTA;

		$steps = str_split($input);
		foreach ($steps as $step) {
			switch ($step) {
				case self::STEP_NORTH:
					$posY[$moving]++;
					break;
				case self::STEP_SOUTH:
					$posY[$moving]--;
					break;
				case self::STEP_EAST:
					$posX[$moving]++;
					break;
				case self::STEP_WEST:
					$posX[$moving]--;
					break;
			}

			$visited[sprintf('%d~%d', $posX[(int) $moving], $posY[(int) $moving])] = true;

			$moving = !$moving;
		}

		return count($visited);
	}
}
