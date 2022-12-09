<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D07;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-07
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	protected const TOTAL_DISK_SIZE = 70000000;
	protected const NEEDED_FREE_SPACE = 30000000;

	protected function processSizes(array $sizes): int
	{
		$freeDiskSpace = self::TOTAL_DISK_SIZE - $sizes['/'];
		$needToFreeUp = self::NEEDED_FREE_SPACE - $freeDiskSpace;

		$size = -1;
		asort($sizes, SORT_NATURAL);
		foreach ($sizes as $size) {
			if ($size >= $needToFreeUp) {
				break;
			}
		}

		return $size;
	}
}
