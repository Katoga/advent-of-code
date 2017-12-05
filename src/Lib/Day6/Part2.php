<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day6;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	const INITIAL_VALUE = 0;

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOn($posX, $posY)
	{
		$this->grid[$posX][$posY]++;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOff($posX, $posY)
	{
		if ($this->grid[$posX][$posY] > 0) {
			$this->grid[$posX][$posY]--;
		}
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function toggle($posX, $posY)
	{
		$this->grid[$posX][$posY] += 2;
	}

	/**
	 *
	 * @return int
	 */
	protected function getResult()
	{
		$brightness = 0;

		foreach ($this->grid as $x => $row) {
			foreach ($row as $y => $field) {
				$brightness += $field;
			}
		}

		return $brightness;
	}
}
