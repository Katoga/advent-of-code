<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D05;

use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-05
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	protected const COMMAND_PATTERN = '~move (?P<cnt>\d+) from (?P<src>\d+) to (?P<dst>\d+)~';

	public function getSolution(string $input): string
	{
		$parts = preg_split('~\n\n~', $input);
		if ($parts === false || count($parts) != 2) {
			throw new RuntimeException('Failed to parse input');
		}

		$stacks = $this->parseStacks(reset($parts));

		$commands = explode(PHP_EOL, end($parts));
		foreach ($commands as $command) {
			if (preg_match(self::COMMAND_PATTERN, $command, $instructionParts) === false) {
				throw new RuntimeException(sprintf('Failed to parse command "%s"', $command));
			}
			if (!empty($instructionParts)) {
				for ($x = 0; $x < $instructionParts['cnt']; $x++) {
					array_push(
						$stacks[(int) $instructionParts['dst'] - 1],
						array_pop(
							$stacks[(int) $instructionParts['src'] - 1]
						)
					);
				}
			}
		}

		$result = implode(
			'',
			array_map(
				function ($element) {
					return end($element);
				},
				$stacks
			)
		);

		return $result;
	}

	/**
	 * @param string $text
	 * @return array<int, array<int, string>>
	 */
	protected function parseStacks(string $text): array
	{
		$textRows = explode(PHP_EOL, $text);
		$stackNumbersRaw = trim(array_pop($textRows));
		$stackNumbers = preg_split('~\\s+~', $stackNumbersRaw);
		if ($stackNumbers === false) {
			throw new RuntimeException(sprintf('Failed to parse stack numbers "%s"', $stackNumbersRaw));
		}
		$stacks = array_fill(0, count($stackNumbers), []);

		foreach ($textRows as $textRow) {
			$matches = [];
			if (preg_match_all('~.(.). ?~', $textRow, $matches) === false) {
				throw new RuntimeException(sprintf('Failed to parse row "%s"', $textRow));
			}

			foreach ($matches[1] as $stackNumber => $crate) {
				if (!empty(trim($crate))) {
					array_unshift($stacks[$stackNumber], $crate);
				}
			}
		}

		return $stacks;
	}
}
