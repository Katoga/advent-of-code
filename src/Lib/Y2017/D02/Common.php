<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2017\D02;

use AdventOfCode\Lib\SolverInterface;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2017-12-07
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
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
				$checksum += $this->getRowResult($numbers);
			}
		}

		return $checksum;
	}

  /**
   * @param array $numbers
   * @return int
   */
  abstract protected function getRowResult(array $numbers): int;
}
