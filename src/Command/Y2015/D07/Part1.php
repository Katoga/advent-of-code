<?php
declare(strict_types=1);

namespace AdventOfCode\Command\Y2015\D07;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-10
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	const SOLUTION_MESSAGE = 'Signal on wire "%s"';

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::getSolutionMessage()
	 */
	protected function getSolutionMessage(): string
	{
		return sprintf(static::SOLUTION_MESSAGE, $this->outputWire);
	}
}
