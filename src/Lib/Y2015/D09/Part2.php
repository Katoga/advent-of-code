<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D09;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Y2015\D09\Common::getResult()
	 */
	protected function getResult(array $distances): int
	{
		return max($distances);
	}
}
