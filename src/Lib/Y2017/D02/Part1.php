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
   * @param array $numbers
   * @return int
   */
	protected function getRowResult(array $numbers): int
	{
		return (max($numbers) - min($numbers));
	}
}
