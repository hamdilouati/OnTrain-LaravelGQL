<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Skill;

class listSkill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:skill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste les models Skill';

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
        dd(Skill::all());
        return 0;
    }
}
