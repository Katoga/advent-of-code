<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D04;

use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-04
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	protected function isOverlapping(array $pair): bool
	{
		return (
			$pair[0][0] >= $pair[1][0] && $pair[0][1] <= $pair[1][1]
		) || (
			$pair[1][0] >= $pair[0][0] && $pair[1][1] <= $pair[0][1]
		);
	}
}
