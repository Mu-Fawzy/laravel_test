<?php

namespace App\Console\Commands;

use App\Models\Dashboard\Admin;
use Illuminate\Console\Command;

class DeactivateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deacivate:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate Admins Every One Hours';

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
        $admins = Admin::where('active', true)->get();
        foreach ($admins as $admin) {
            $admin->active = false;
            $admin->save();
        }
        // return 0;
    }
}
