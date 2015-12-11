<?php
namespace AdventOfCode\Lib\Day2;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	protected function getWrapAmount($width, $length, $height)
	{
		return 2 * $width + 2 * $length;
	}

	protected function getExtraAmount($width, $length, $height)
	{
		return $width * $length * $height;
	}
}
