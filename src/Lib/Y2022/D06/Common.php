<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D06;

use AdventOfCode\Lib\SolverInterface;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	protected const PACKET_MARKER_LENGTH = -1;

	public function getSolution(string $input): int
	{
		$chars = str_split($input);
		$start = 0;

		$foursome = array_slice($chars, $start, static::PACKET_MARKER_LENGTH);
		$uniqueChars = count(array_unique($foursome));

		while ($uniqueChars != static::PACKET_MARKER_LENGTH) {
			$start++;
			$foursome = array_slice($chars, $start, static::PACKET_MARKER_LENGTH);
			$uniqueChars = count(array_unique($foursome));
		}

		return $start + static::PACKET_MARKER_LENGTH;
	}
}
