<?php

namespace OBS\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use OBS\Jobs\WeeklyNotification;
use OBS\User;
use Exception;
class HandleWeeklyNotification extends Command
{
    use DispatchesJobs;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'obs:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User weekly notification';

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
        //
        $this->getUsers();
    }

    public function getUsers() {
        try {
            $users = User::all();
            foreach($users as $user) {
                $this->dispatch(
                    new WeeklyNotification($user)
                );
            }

        } catch (Exception $e) {

        }
    }
}
