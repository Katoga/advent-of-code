<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D05;

use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-05
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 extends Common
{
	protected function executeInstruction(array $stacks, int $count, int $source, int $destination): array
	{
		$moving = array_splice($stacks[$source], -$count);
		foreach ($moving as $crate) {
			$stacks[$destination][] = $crate;
		}

		return $stacks;
	}
}
