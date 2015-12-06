<?php
namespace AdventOfCode\Day6\Part2;

use AdventOfCode\SolverInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-06
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Solver implements SolverInterface
{

	const GRID_SIZE = 1000;

	/**
	 *
	 * @var array
	 */
	protected $grid = [];

	/**
	 *
	 * @var string $pattern
	 */
	protected $pattern = '~^(?<cmd>turn on|turn off|toggle) (?<x1>\d{1,3}),(?<y1>\d{1,3}) through (?<x2>\d{1,3}),(?<y2>\d{1,3})$~';

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		ini_set('memory_limit', '1G');

		$this->initGrid();

		$commands = explode(PHP_EOL, $input);

		foreach ($commands as $command) {
			try {
				$this->runCommand($command);
			} catch (\RuntimeException $e) {
				// TODO where to log it?
			}
		}

		return $this->getBrightness();
	}

	protected function initGrid()
	{
		$row = array_fill(0, self::GRID_SIZE, 0);

		$this->grid = array_fill(0, self::GRID_SIZE, $row);
	}

	/**
	 *
	 * @param string $command
	 */
	protected function runCommand($command)
	{
		$commandParts = $this->parseCommand($command);

		for ($x = $commandParts['x1']; $x <= $commandParts['x2']; $x++) {
			for ($y = $commandParts['y1']; $y <= $commandParts['y2']; $y++) {
				$this->{$commandParts['cmd']}($x, $y);
			}
		}
	}

	/**
	 *
	 * @param string $command
	 * @return array
	 * @throws \RuntimeException
	 */
	protected function parseCommand($command)
	{
		$parsed = [];

		if (preg_match($this->pattern, $command, $parsed) !== 1) {
			throw new \RuntimeException(sprintf('Invalid command "%s"', $command));
		}

		// normalize cmd ("turn on" -> "turnOn")
		$cmdParts = explode(' ', $parsed['cmd']);
		$parsed['cmd'] = array_shift($cmdParts);
		$parsed['cmd'] .= ucfirst(reset($cmdParts));

		// normalize coordinates
		$parsed['x1'] = (int) $parsed['x1'];
		$parsed['y1'] = (int) $parsed['y1'];
		$parsed['x2'] = (int) $parsed['x2'];
		$parsed['y2'] = (int) $parsed['y2'];

		return $parsed;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOn($posX, $posY)
	{
		$this->grid[$posX][$posY]++;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOff($posX, $posY)
	{
		if ($this->grid[$posX][$posY] > 0) {
			$this->grid[$posX][$posY]--;
		}
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function toggle($posX, $posY)
	{
		$this->grid[$posX][$posY] += 2;
	}

	/**
	 *
	 * @return int
	 */
	protected function getBrightness()
	{
		$brightness = 0;

		foreach ($this->grid as $x => $row) {
			foreach ($row as $y => $field) {
				$brightness += $field;
			}
		}

		return $brightness;
	}
}
