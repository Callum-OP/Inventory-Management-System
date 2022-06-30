<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Inventory;

class CheckInventory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:inventory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the number of unique products stored in the inventory';

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
        echo Inventory::count() . " unique products\n";
    }
}
