<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\MissYouUser;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users-not-logged-in-for-month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Notification for the user didn't log in for a month";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Notify the user by an email if he didn't log in for 1 month.
        $users = User::whereDate('last_login', '<', Carbon::now()->subMonth()->toDateTimeString())->get();
        // For every user who match the rule above will be notified.
        foreach ($users as $user) {
            $user->notify(new MissYouUser($user));
        }
    }
}
