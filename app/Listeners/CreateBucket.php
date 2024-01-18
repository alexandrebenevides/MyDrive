<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\MinioService;
use App\Models\Bucket;

class CreateBucket
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;
        $bucketName = MinioService::createBucket();
       
        Bucket::create([
            'user_id' => $user->id,
            'name' => $bucketName,
        ]);
    }
}
