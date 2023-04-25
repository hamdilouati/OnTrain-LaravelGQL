<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Person;

class listPerson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:person';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste les models Person';

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
        dd(Person::all());
        return 0;
    }
}
