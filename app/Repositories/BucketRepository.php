<?php

namespace App\Repositories;

use App\Repositories\Contracts\BucketRepositoryInterface;
use App\Models\Bucket;

class BucketRepository implements BucketRepositoryInterface
{
    public function create(array $data) {
        return Bucket::create($data);
    }
}