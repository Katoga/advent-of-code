<?php
declare(strict_types=1);

namespace AdventOfCode\Command;

use AdventOfCode\Lib\SolverInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

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

	/**
	 *
	 * @param SolverInterface $solver
	 */
	public function __construct(SolverInterface $solver)
	{
		list(, , $this->year, $this->day, $this->part) = explode('\\', get_class($this));

		parent::__construct(strtolower(sprintf('%s:%s%s', $this->year, $this->day, $this->part)));

		$this->solver = $solver;
	}

	protected function configure()
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
	protected function initialize(InputInterface $input, OutputInterface $output)
	{
		$this->inputData = file_get_contents($input->getOption(self::OPTION_INPUT_DATA_NAME));
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \Symfony\Component\Console\Command\Command::execute()
	 */
	public function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln(sprintf('%s: %d', $this->getSolutionMessage(), $this->getSolution()));
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
	protected function getSolution(): int
	{
		return $this->solver->getSolution($this->inputData);
	}
}
