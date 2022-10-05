<?php

namespace App\Console\Commands;

use App\Mail\NotifyUser;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to users';

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
        //$user = User::SELECT('email')->get(); it gets collection of data
        $emails = User::pluck('email')->toArray();
        $data=['title'=>'Programing','body'=>'PHP'];
        foreach($emails as $email)
        {
            Mail::To($email)->send(new NotifyUser($data));
        }
    }
}
