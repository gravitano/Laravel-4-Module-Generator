<?php namespace Martel\ModuleL4;

use Illuminate\Support\ServiceProvider;
use Martel\ModuleL4\Commands\ModuleGenerate;
use Martel\ModuleL4\Generators\Module;

class ModuleL4ServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    public function boot()
    {
        $this->package('martel/module-l4');
    }
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['generate.module'] = $this->app->share(function($app){
            $gen = new Module($app['files'], $app['config']);
            return new ModuleGenerate($gen);
        });

        $this->commands('generate.module');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('module-l4');
	}

}