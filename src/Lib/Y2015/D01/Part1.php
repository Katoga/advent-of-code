<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D01;

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
		$up = substr_count($input, self::FLOOR_UP);
		$down = substr_count($input, self::FLOOR_DOWN);

		return ($up - $down);
	}
}
