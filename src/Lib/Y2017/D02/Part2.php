<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D02;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
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
				rsort($numbers, SORT_NUMERIC);
				$length = count($numbers);
				for ($i = 0; $i <= $length; $i++) {
					$dividend = $numbers[$i];

					for ($j = $i + 1; $j < $length; $j++) {
						$divisor = $numbers[$j];

						if (($dividend % $divisor) == 0) {
							$checksum += ($dividend / $divisor);
							break 2;
						}
					}
				}
			}
		}

		return $checksum;
	}
}
