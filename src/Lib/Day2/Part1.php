<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Day2;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Day2\Common::getWrapAmount()
	 */
	protected function getWrapAmount($width, $length, $height)
	{
		return 2 * $width * $length + 2 * $width * $height + 2 * $length * $height;
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Day2\Common::getWrapAmount()
	 */
	protected function getExtraAmount($width, $length, $height)
	{
		return $width * $length;
	}
}
