<?php
namespace AdventOfCode\Command\Day7;

use AdventOfCode\Command\Day7;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-10
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Day7
{
	const SOLUTION_MESSAGE = 'Signal on wire "%s"';

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::getSolutionMessage()
	 */
	protected function getSolutionMessage()
	{
		return sprintf(static::SOLUTION_MESSAGE, $this->solver->getOutputWire());
	}
}
