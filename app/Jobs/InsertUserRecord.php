<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Bus\Batchable;

class InsertUserRecord implements ShouldQueue
{
    use Queueable, Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected int $records)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for ($i = 0; $i < $this->records; $i++) {
            User::factory()->create();
        }
    }
}
