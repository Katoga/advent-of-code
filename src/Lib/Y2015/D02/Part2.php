<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D02;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	protected function getWrapAmount(int $width, int $length, int $height): int
	{
		return 2 * $width + 2 * $length;
	}

	protected function getExtraAmount(int $width, int $length, int $height): int
	{
		return $width * $length * $height;
	}
}
