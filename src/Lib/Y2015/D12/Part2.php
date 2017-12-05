<?php
declare(strict_types=1);

namespace AdventOfCode\Lib\Y2015\D12;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-15
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{

	const BAD_WORD = 'red';

	/**
	 *
	 * @param array $array
	 * @return int
	 */
	protected function sum(array $array): int
	{
		$sum = 0;
		$isArray = true;

		$keys = array_keys($array);
		foreach ($keys as $key => $originalKey) {
			if ($key != $originalKey) {
				$isArray = false;
				break;
			}
		}

		foreach ($array as $key => $item) {
			if (!$isArray && is_string($item) && ($item == static::BAD_WORD)) {
				$sum = 0;
				break;
			} elseif (is_array($item)) {
				$sum += $this->sum($item);
			} elseif (is_int($item) || is_numeric($item)) {
				$sum += $item;
			}
		}

		return $sum;
	}
}
