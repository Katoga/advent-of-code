<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D08;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	/**
	 * @param string $line
	 * @return int
	 */
	protected function getCharsCnt(string $line): int
	{
		return $this->getEscapedLength($line) - $this->getLiteralsLength($line);
	}

	/**
	 *
	 * @param string $string
	 * @return int
	 */
	protected function getEscapedLength(string $string): int
	{
		// escape backslash
		$string = str_replace('\\', '..', $string);

		// escape double quote
		$string = str_replace('"', '..', $string);

		// add enclosing quotes
		$string = sprintf('"%s"', $string);

		return strlen($string);
	}
}
