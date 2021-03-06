<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D03;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	const SANTA = true;
	const ROBOT = false;

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		// start at 0~0
		$posX = [
			(int) self::SANTA => 0,
			(int) self::ROBOT => 0
		];
		$posY = [
			(int) self::SANTA => 0,
			(int) self::ROBOT => 0
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
			$who = (int) $moving;
			list($posX[$who], $posY[$who]) = $this->doStep($step, $posX[$who], $posY[$who]);

			$visited[sprintf('%d~%d', $posX[$who], $posY[$who])] = true;

			$moving = !$moving;
		}

		return count($visited);
	}
}
