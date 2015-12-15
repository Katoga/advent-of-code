<?php
namespace AdventOfCode\Command\Day14;

use AdventOfCode\Command\Commons;
use AdventOfCode\Lib\Day14\SolverInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 * @author Katoga <katoga.cz@hotmail.com>
 * @since 2015-12-15
 * @license https://opensource.org/licenses/ISC ISC licence
 */
abstract class Common extends Commons
{
	const DESCRIPTION = 'Reindeer Olympics';

	const SOLUTION_MESSAGE = 'Winner traveled';

	const OPTION_DURATION_NAME = 'duration';

	const OPTION_DURATION_SHORT = 'd';

	const DEFAULT_DURATION = 2503;

	/**
	 *
	 * @var SolverInterface
	 */
	protected $solver;

	/**
	 *
	 * @var string
	 */
	protected $duration;

	/**
	 *
	 * @param SolverInterface $solver
	 */
	public function __construct(SolverInterface $solver)
	{
		parent::__construct($solver);
	}

	protected function configure()
	{
		parent::configure();

		$this->addOption(
			static::OPTION_DURATION_NAME,
			static::OPTION_DURATION_SHORT,
			InputOption::VALUE_REQUIRED,
			'Race duration',
			static::DEFAULT_DURATION
		);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::initialize()
	 */
	protected function initialize(InputInterface $input, OutputInterface $output)
	{
		parent::initialize($input, $output);

		$this->duration = $input->getOption(static::OPTION_DURATION_NAME);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \AdventOfCode\Command\Commons::getSolution()
	 */
	protected function getSolution()
	{
		$this->solver->setDuration($this->duration);

		return parent::getSolution();
	}
}
