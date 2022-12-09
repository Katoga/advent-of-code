<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D07;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-07
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	protected function processSizes(array $sizes): int
	{
		$sizes = array_filter($sizes, function ($value) {
			return $value <= self::SIZE_LIMIT;
		});

		return array_sum($sizes);
	}
}
