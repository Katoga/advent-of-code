<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D05;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-05
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	protected function executeInstruction(array $stacks, int $count, int $source, int $destination): array
	{
		for ($x = 0; $x < $count; $x++) {
			array_push(
				$stacks[$destination],
				array_pop(
					$stacks[$source]
				)
			);
		}

		return $stacks;
	}
}
