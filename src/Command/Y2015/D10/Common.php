<?php
declare(strict_types=1);

namespace AdventOfCode\Command\Y2015\D10;

use AdventOfCode\Command\Commons;
use AdventOfCode\Lib\Y2015\D10\SolverInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-12
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common extends Commons
{
	const DEFAULT_CYCLES = 0;

	const DESCRIPTION = 'Elves Look, Elves Say';

	const SOLUTION_MESSAGE = 'After "%d" iterations';

	const OPTION_CYCLES_NAME = 'cycles';

	const OPTION_CYCLES_SHORT = 'c';

	/**
	 *
	 * @var SolverInterface
	 */
	protected $solver;

	/**
	 *
	 * @var int
	 */
	protected $cycles;

	protected function configure(): void
	{
		parent::configure();

		$this->addOption(
			static::OPTION_CYCLES_NAME,
			static::OPTION_CYCLES_SHORT,
			InputOption::VALUE_REQUIRED,
			'Number of CYCLES',
			static::DEFAULT_CYCLES
		);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::initialize()
	 */
	protected function initialize(InputInterface $input, OutputInterface $output): void
	{
		parent::initialize($input, $output);

		$this->cycles = $input->getOption(static::OPTION_CYCLES_NAME);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::getSolution()
	 */
	protected function getSolution(): int
	{
		$this->solver->setIterations($this->cycles);

		return parent::getSolution();
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::getSolutionMessage()
	 */
	protected function getSolutionMessage(): string
	{
		return sprintf(static::SOLUTION_MESSAGE, $this->cycles);
	}
}
