<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SalesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to admins on sales made daily';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
