<?php
namespace AdventOfCode\Day6\Part1;

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

		$this->log(PHP_EOL);

		$this->logMemoryUsage('start');

		$this->initGrid();

		$this->logMemoryUsage();

		$commands = explode(PHP_EOL, $input);

		foreach ($commands as $command) {
			try {
				$this->logMemoryUsage();
				$this->runCommand($command);
			} catch (\RuntimeException $e) {
				$this->log($e->getMessage());
			}
		}

		return $this->getLitLightsCount();
	}

	protected function initGrid()
	{
		$row = array_fill(0, self::GRID_SIZE, false);

		$this->grid = array_fill(0, self::GRID_SIZE, $row);
	}

	/**
	 *
	 * @param string $command
	 */
	protected function runCommand($command)
	{
		$commandParts = $this->parseCommand($command);

		$this->logMemoryUsage();

		for ($x = $commandParts['x1']; $x <= $commandParts['x2']; $x++) {
			for ($y = $commandParts['y1']; $y <= $commandParts['y2']; $y++) {
				$this->logMemoryUsage($x . '/' . $y);
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
		$this->grid[$posX][$posY] = true;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function turnOff($posX, $posY)
	{
		$this->grid[$posX][$posY] = false;
	}

	/**
	 *
	 * @param int $posX
	 * @param int $posY
	 */
	protected function toggle($posX, $posY)
	{
		$this->grid[$posX][$posY] = !$this->grid[$posX][$posY];
	}

	/**
	 *
	 * @return int
	 */
	protected function getLitLightsCount()
	{
		$cnt = 0;

		foreach ($this->grid as $x => $row) {
			foreach ($row as $y => $field) {
				if ($field) {
					$cnt++;
				}
			}
		}

		return $cnt;
	}

	protected function log($msg)
	{
		file_put_contents('/tmp/ktg.dbg', $msg . PHP_EOL, FILE_APPEND);
	}

	protected function logMemoryUsage($prefix = '')
	{
		$msg = '';

		if ($prefix) {
			$msg = $prefix . ' ';
		}

		$msg .= memory_get_usage();

		$this->log($msg);
	}
}
