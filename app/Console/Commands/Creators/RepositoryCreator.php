<?php

namespace App\Console\Commands\Creators;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use function base_path;

class RepositoryCreator extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository';

    protected $type = 'Repository';

    public function handle()
    {
        $this->input->setArgument('name', $this->argument('name').'Repository');
        parent::handle();
    }

    protected function getStub(){
        return base_path('stubs/repository.stub');
    }

    protected function getDefaultNamespace($rootNamespace){
        return $rootNamespace . '\Repositories';
    }

    protected function replaceClass($stub, $name){
        $namespace = str_replace($this->getNamespace($name).'\\', '', $name);

        return str_replace('{{namespace}}', $namespace, $stub);
    }
}
