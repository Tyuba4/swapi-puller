<?php

namespace App\Console\Commands;

use App\Libraries\SWAPIPuller\Puller;
use App\Libraries\SWAPIPuller\PullerLoader;
use Illuminate\Console\Command;

class PullSWAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pull-swapi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull all data from swapi.dev';

    protected $puller;
    protected $pullerLoader;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->pullerLoader = new PullerLoader();
        $this->puller = new Puller($this->pullerLoader);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() :void
    {
        $this->puller->pullApiResources();
    }
}
