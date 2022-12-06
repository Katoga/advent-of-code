<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D06;

use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	protected const PACKET_MARKER_LENGTH = 4;

	public function getSolution(string $input): int
	{
		$chars = str_split($input);
		$start = 0;

		$foursome = array_slice($chars, $start, self::PACKET_MARKER_LENGTH);
		$uniqueChars = count(array_unique($foursome));

		while ($uniqueChars != self::PACKET_MARKER_LENGTH) {
			$start++;
			$foursome = array_slice($chars, $start, self::PACKET_MARKER_LENGTH);
			$uniqueChars = count(array_unique($foursome));
		}

		return $start + self::PACKET_MARKER_LENGTH;
	}
}
