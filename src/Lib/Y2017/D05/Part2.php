<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D05;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-12
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
    $steps = 0;

    $rows = explode(PHP_EOL, trim($input));
    $position = 0;
    $lastPosition = count($rows) - 1;

    do {
      $oldPosition = $position;

      $position += $rows[$position];

      if ($rows[$oldPosition] >= 3) {
        $rows[$oldPosition]--;
      } else {
        $rows[$oldPosition]++;
      }

      $steps++;
    } while ($position >= 0 && $position <= $lastPosition);
		return $steps;
  }
}
