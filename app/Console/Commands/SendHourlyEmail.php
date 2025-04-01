<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendHourlyMail;

class SendHourlyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email hourly';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to('user@example.com')->send(new SendHourlyMail());
        $this->info('Hourly email sent successfully!');
    }
}
