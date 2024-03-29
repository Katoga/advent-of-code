<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D01;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$floor = 0;
		$chars = str_split($input);
		$basement = false;

		foreach ($chars as $index => $char) {
			switch ($char) {
				case self::FLOOR_UP:
					$floor++;
					break;
				case self::FLOOR_DOWN:
					$floor--;
					break;
			}

			if ($floor < 0) {
				$basement = true;
				break;
			}
		}

		if ($basement) {
			/**
			 * Strange bug in phpstan
			 * maybe related: https://github.com/phpstan/phpstan/issues/7706
			 * @phpstan-ignore-next-line
			 */
			$step = $index + 1;
		} else {
			$step = 0;
		}


		return $step;
	}
}
