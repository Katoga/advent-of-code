<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day6;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	const INITIAL_VALUE = false;

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOn($posX, $posY)
	{
		$this->grid[$posX][$posY] = true;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOff($posX, $posY)
	{
		$this->grid[$posX][$posY] = false;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function toggle($posX, $posY)
	{
		$this->grid[$posX][$posY] = !$this->grid[$posX][$posY];
	}

	/**
	 *
	 * @return int
	 */
	protected function getResult()
	{
		$cnt = 0;

		foreach ($this->grid as $x => $row) {
			foreach ($row as $y => $field) {
				if ($field) {
					$cnt++;
				}
			}
		}

		return $cnt;
	}
}
