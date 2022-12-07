<?php

declare(strict_types=1);

namespace AdventOfCode\Lib\Y2022\D07;

use RuntimeException;

/**
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2022-12-07
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part1 extends Common
{
	protected const CMD_PATTERN = '~^(?P<cmd>[a-z]+)( (?P<arg>[a-z]+|\.\.|/))?$~';
	protected const CMD_LS = 'ls';
	protected const CMD_CD = 'cd';

	protected const SIZE_LIMIT = 100000;

	public function getSolution(string $input): int
	{
		$instructions = explode('$', $input);
		$instructions = array_filter($instructions);

		// the first line is always 'cd /'
		array_shift($instructions);

		$currentDir = '/';
		$sizes = [
			'/' => 0,
		];

		foreach ($instructions as $instruction) {
			$instruction = trim($instruction);
			$lines = explode(PHP_EOL, $instruction);

			$command = trim(array_shift($lines));

			$matches = [];
			if (preg_match(self::CMD_PATTERN, $command, $matches) === false) {
				throw new RuntimeException(sprintf('Failed to parse command "%s"', $command));
			}

			switch ($matches['cmd']) {
				case self::CMD_LS:
					foreach ($lines as $line) {
						$lineParts = explode(' ', $line);
						if (is_numeric($lineParts[0])) {
							$fileSize = (int) $lineParts[0];
							$sizes['/'] += $fileSize;
							$parts = array_filter(explode('/', trim($currentDir, '/')));
							if ($parts) {
								$updir = '/';
								foreach ($parts as $part) {
									$updir .= sprintf('%s/', $part);
									$sizes[$updir] += $fileSize;
								}
							}
						}
					}
					break;
				case self::CMD_CD:
					if ($matches['arg'] == '..') {
						$parts = explode('/', rtrim($currentDir, '/'));
						array_pop($parts);
						$currentDir = sprintf('%s/', implode('/', $parts));
					} else {
						$currentDir = sprintf('%s%s/', $currentDir, $matches['arg']);
						if (!array_key_exists($currentDir, $sizes)) {
							$sizes[$currentDir] = 0;
						}
					}
					break;
				default:
					throw new RuntimeException(sprintf('Unknown command "%s"', $matches['cmd']));
			}
		}

		$sizes = array_filter($sizes, function ($value) {
			return $value <= self::SIZE_LIMIT;
		});

		return array_sum($sizes);
	}
}
