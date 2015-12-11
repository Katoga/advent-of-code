<?php
namespace AdventOfCode\Lib\Day7;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-10
 * @license https://opensource.org/licenses/ISC ISC licence
 */
class Part2 implements SolverInterface
{

	const CONNECT_TOKEN = '->';

	/**
	 *
	 * @var string
	 */
	protected $outputWire;

	/**
	 *
	 * @var array
	 */
	protected $instructionStack = [];

	/**
	 *
	 * @var array
	 */
	protected $signals = [];

	/**
	 *
	 * @var array
	 */
	protected $hackedWires = [
		'b' => 46065
	];

	/**
	 *
	 * @param string $input
	 * @return int
	 */
	public function getSolution($input)
	{
		$this->loadInstructionStack($input);

		return $this->getSignal($this->outputWire);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Lib\Day7\SolverInterface::setOutputWire()
	 */
	public function setOutputWire($outputWire)
	{
		$this->outputWire = $outputWire;
	}

	/**
	 *
	 * @param string $inputStr
	 */
	protected function loadInstructionStack($inputStr)
	{
		$instructions = explode(PHP_EOL, $inputStr);
		foreach ($instructions as $instructionStr) {
			list($instruction, $targetWire) = explode(self::CONNECT_TOKEN, $instructionStr);
			$this->instructionStack[trim($targetWire)] = trim($instruction);
		}

		if (!array_key_exists($this->outputWire, $this->instructionStack)) {
			throw new \RuntimeException(sprintf('Output wire "%s" will not get any signal!', $this->outputWire));
		}
	}

	/**
	 *
	 * @param string $wire
	 * @return int
	 */
	protected function getSignal($wire)
	{
		if (!isset($this->signals[$wire])) {
			$instruction = $this->instructionStack[$wire];

			$matches = [];

			if (isset($this->hackedWires[$wire])) {
				$signal = $this->hackedWires[$wire];
			} elseif (preg_match('~^(?<signal>\d+)$~', $instruction, $matches) === 1) {
				// actual signal
				$signal = $matches['signal'];
			} elseif (preg_match('~^(?<wire>[a-z]+)$~', $instruction, $matches) === 1) {
				// direct wire
				$signal = $this->getSignal($matches['wire']);
			} elseif (preg_match('~^NOT (?<wire>[a-z]+)$~', $instruction, $matches) === 1) {
				// get signal on input wire
				$inputWireSignal = $this->getSignal($matches['wire']);
				// bitwise complement of input wire
				$signal = ~$inputWireSignal;
			} elseif (preg_match('~^(?<left>([a-z]+|\d+)) (?<op>AND|OR) (?<right>([a-z]+|\d+))$~', $instruction, $matches) === 1) {
				// get signal on left input wire
				if (is_numeric($matches['left'])) {
					$left = $matches['left'];
				} else {
					$left = $this->getSignal($matches['left']);
				}

				// get signal on right input wire
				if (is_numeric($matches['right'])) {
					$right = $matches['right'];
				} else {
					$right = $this->getSignal($matches['right']);
				}

				// join wires with gate
				switch ($matches['op']) {
					case 'AND':
						$signal = $left & $right;
						break;
					case 'OR':
						$signal = $left | $right;
						break;
				}
			} elseif (preg_match('~^(?<wire>[a-z]+) (?<dir>[RL])SHIFT (?<bits>\d+)$~', $instruction, $matches) === 1) {
				// get signal of input wire
				$inputWireSignal = $this->getSignal($matches['wire']);

				// shift in requested direction by requested bits
				switch ($matches['dir']) {
					case 'R':
						$signal = $inputWireSignal >> $matches['bits'];
						break;
					case 'L':
						$signal = $inputWireSignal << $matches['bits'];
						break;
				}
			} else {
				throw new \RuntimeException(sprintf('Wrong instruction "%s"', $instruction));
			}

			$signal %= 65535;

			if ($signal < 0) {
				$signal += 65536;
			}
			if ($signal > 65535) {
				$signal -= 65536;
			}

			$this->signals[$wire] = $signal;
		}

		return $this->signals[$wire];
	}
}
