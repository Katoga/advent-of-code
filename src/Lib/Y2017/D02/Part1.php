<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D02;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-07
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 * @param string $input
	 * @return int
	 */
	public function getSolution(string $input): int
	{
		$checksum = 0;

		$rows = explode(PHP_EOL, $input);
		foreach ($rows as $row) {
			if (!empty($row)) {
				$numbers = explode("\t", $row);
				$checksum += (max($numbers) - min($numbers));
			}
		}

		return $checksum;
	}
}
