<?php
declare(strict_types=1);

namespace AdventOfCode\Command;

use AdventOfCode\Lib\SolverInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-08
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Commons extends Command
{
	const DESCRIPTION = '';
	const SOLUTION_MESSAGE = '';

	const OPTION_INPUT_DATA_NAME = 'input-data';

	const OPTION_INPUT_DATA_SHORT = 'i';

	/**
	 *
	 * @var SolverInterface $solver
	 */
	protected $solver;

	/**
	 *
	 * @var string
	 */
	protected $inputData;

	/**
	 * @var string
	 */
	protected $year;
	/**
	 * @var string
	 */
	protected $day;
	/**
	 * @var string
	 */
	protected $part;

	public function __construct()
	{
		list(, , $this->year, $this->day, $this->part) = explode('\\', get_class($this));

		parent::__construct(strtolower(sprintf('%s:%s%s', $this->year, $this->day, $this->part)));

		$solverClassName = str_replace('Command', 'Lib', get_class($this));
		/**
		 * @var SolverInterface
		 */
		$solver = new $solverClassName;
		$this->solver = $solver;
	}

	protected function configure(): void
	{
		$this->addOption(
			self::OPTION_INPUT_DATA_NAME,
			self::OPTION_INPUT_DATA_SHORT,
			InputOption::VALUE_REQUIRED,
			'Path to input file.',
			$this->getDefaultInputSrc()
		)
		->setDescription(sprintf('%s (%s)', static::DESCRIPTION, $this->part));
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \Symfony\Component\Console\Command\Command::initialize()
	 */
	protected function initialize(InputInterface $input, OutputInterface $output): void
	{
		$data = file_get_contents($input->getOption(self::OPTION_INPUT_DATA_NAME));
		if ($data === false) {
			throw new RuntimeException('Failed to load input data.');
		}

		$this->inputData = $data;
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \Symfony\Component\Console\Command\Command::execute()
	 */
	public function execute(InputInterface $input, OutputInterface $output): int
	{
		$output->writeln(sprintf('%s: %s', $this->getSolutionMessage(), $this->getSolution()));

		return Command::SUCCESS;
	}

	/**
	 *
	 * @return string
	 */
	protected function getDefaultInputSrc(): string
	{
		return sprintf('%s/%s/%s/input.txt', __DIR__, $this->year, $this->day);
	}

	/**
	 *
	 * @return string
	 */
	protected function getSolutionMessage(): string
	{
		return static::SOLUTION_MESSAGE;
	}

	/**
	 *
	 * @return int
	 */
	protected function getSolution(): int|string
	{
		return $this->solver->getSolution($this->inputData);
	}
}
