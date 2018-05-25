<?php

namespace Project\Blog\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

// use SplFileObject;
// use Sentinel;

class TestCommand extends Command
{
    use DispatchesJobs;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:test {action?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Blog Test description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {
        if (method_exists($this, $action = $this->argument('action'))) {
            return $this->$action();
        }
        return $this->defaultAction();
    }
    private function defaultAction(){
    }

}
