<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day9;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Day9\Common::getResult()
	 */
	protected function getResult(array $distances): int
	{
		return min($distances);
	}
}
