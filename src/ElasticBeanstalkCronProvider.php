<?php


namespace eis3nhorn\LaravelElasticBeanstalkCron;


use eis3nhorn\LaravelElasticBeanstalkCron\Console\AWS\ConfigureLeaderCommand;
use eis3nhorn\LaravelElasticBeanstalkCron\Console\System\SetupLeaderSelectionCRONCommand;
use eis3nhorn\LaravelElasticBeanstalkCron\Console\System\SetupSchedulerCommand;
use Illuminate\Support\ServiceProvider;

class ElasticBeanstalkCronProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConsoleCommands();
    }

    public function boot()
    {
        $this->publishes([
                             __DIR__.'/.ebextensions' => base_path('/.ebextensions'),
                             __DIR__.'/elasticbeanstalkcron.php' => config_path('elasticbeanstalkcron.php')
                         ], 'ebcron');
    }

    protected function registerConsoleCommands()
    {
        $this->commands([
                            ConfigureLeaderCommand::class,
                            SetupLeaderSelectionCRONCommand::class,
                            SetupSchedulerCommand::class
                        ]);
    }
}