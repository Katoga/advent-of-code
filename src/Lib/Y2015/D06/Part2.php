<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D06;

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
	protected function turnOn(int $posX, int $posY): void
	{
		$this->grid[$posX][$posY]++;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOff(int $posX, int $posY): void
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
	protected function toggle(int $posX, int $posY): void
	{
		$this->grid[$posX][$posY] += 2;
	}

	/**
	 *
	 * @return int
	 */
	protected function getResult(): int
	{
		$brightness = 0;

		foreach ($this->grid as $row) {
			foreach ($row as $field) {
				$brightness += $field;
			}
		}

		return $brightness;
	}
}
