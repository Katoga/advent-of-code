<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D03;

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

	/**
	 * @param string $step
	 * @param int $posX
	 * @param int $posY
	 * @return array<int>
	 */
	protected function doStep(string $step, int $posX, int $posY): array
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
