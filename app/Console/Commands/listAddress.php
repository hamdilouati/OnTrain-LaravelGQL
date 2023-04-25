<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Address;

class listAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:address';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste les models Address';

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
        dd(Address::all());
        return 0;
    }
}
