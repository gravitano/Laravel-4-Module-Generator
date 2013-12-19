<?php namespace Martel\ModuleL4\Commands;

use Illuminate\Console\Command;
use Martel\ModuleL4\Generators\Module;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ModuleGenerate extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:module';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generates an HMVC style module for a laravel app.';

    /**
     * Generator which will be fired from this command
     * @var \Martel\ModuleL4\Generators\Module
     */
    protected $generator;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Module $generator)
	{
		parent::__construct();

        $this->generator = $generator;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
//        if()
        $to_be_created = $this->generator->make($this->argument('modulename'));

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('modulename', InputArgument::REQUIRED, 'Name of the module to be created.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
//			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
