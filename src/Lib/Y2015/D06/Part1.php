<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D06;

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
	protected function turnOn(int $posX, int $posY): void
	{
		$this->grid[$posX][$posY] = true;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOff(int $posX, int $posY): void
	{
		$this->grid[$posX][$posY] = false;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function toggle(int $posX, int $posY): void
	{
		$this->grid[$posX][$posY] = !$this->grid[$posX][$posY];
	}

	/**
	 *
	 * @return int
	 */
	protected function getResult(): int
	{
		$cnt = 0;

		foreach ($this->grid as $row) {
			foreach ($row as $field) {
				if ($field) {
					$cnt++;
				}
			}
		}

		return $cnt;
	}
}
