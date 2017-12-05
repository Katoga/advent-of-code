<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D08;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-11
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 * @param string $line
	 * @return int
	 */
	protected function getCharsCnt(string $line): int
	{
		return $this->getLiteralsLength($line) - $this->getDecodedLength($line);
	}

	/**
	 *
	 * @param string $string
	 * @return int
	 */
	protected function getDecodedLength(string $string): int
	{
		// remove enclosing double quotes
		$string = trim($string, '"');

		// replace escaped double quote with the double quote itself
		$string = str_replace('\"', '"', $string);

		// replace escaped backslash with the backslash itself
		$string = str_replace('\\\\', '\\', $string);

		// decode hexadecimal char
		$string = preg_replace_callback('~\\\x(?<ord>[a-f0-9]{2})~', function($matches) {return chr(hexdec($matches['ord']));}, $string);

		return strlen($string);
	}
}
