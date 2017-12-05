<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D03;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		// start at 0~0
		$posX = 0;
		$posY = 0;
		$visited = [
			sprintf('%d~%d', $posX, $posY) => true
		];

		$steps = str_split($input);
		foreach ($steps as $step) {
			list($posX, $posY) = $this->doStep($step, $posX, $posY);

			$visited[sprintf('%d~%d', $posX, $posY)] = true;
		}

		return count($visited);
	}
}
