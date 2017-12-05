<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day3;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-11
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	const STEP_NORTH = '^';
	const STEP_SOUTH = 'v';
	const STEP_EAST = '>';
	const STEP_WEST = '<';

	protected function doStep($step, $posX, $posY)
	{
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

		return [
			$posX,
			$posY
		];
	}
}
