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
			$count += $this->getCharsCnt($line);
		}

		return $count;
	}

	/**
	 *
	 * @param string $line
	 * @return int
	 */
	protected function getCharsCnt($line)
	{
		return $this->getLiteralsLength($line) - $this->getStringLength($line);
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
	 *
	 * @param string $string
	 * @return int
	 */
	protected function getStringLength($string)
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
