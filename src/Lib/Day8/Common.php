<?php
namespace AdventOfCode\Lib\Day8;

use AdventOfCode\Lib\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-11
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common implements SolverInterface
{
	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$count = 0;

		$lines = explode(PHP_EOL, $input);

		foreach ($lines as $line) {
			$line = trim($line);
			if (!empty($line)) {
				$count += $this->getCharsCnt($line);
			}
		}

		return $count;
	}

	/**
	 *
	 * @param string $string
	 * @return int
	 */
	protected function getLiteralsLength($string)
	{
		return strlen($string);
	}

	/**
	 * @param string $line
	 * @return int
	 */
	abstract protected function getCharsCnt($line);
}
