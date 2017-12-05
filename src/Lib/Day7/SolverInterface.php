<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day7;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-10
 * @license https://opensource.org/licenses/ISC ISC licence
 */
interface SolverInterface extends \AdventOfCode\Lib\SolverInterface
{

	/**
	 *
	 * @param string $outputWire
	 */
	public function setOutputWire($outputWire);
}
