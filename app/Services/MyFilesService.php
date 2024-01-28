<?php

namespace App\Services;

use App\Services\Contracts\MyFilesServiceInterface;
use App\Services\MinioService;
use Auth;

class MyFilesService implements MyFilesServiceInterface
{
    private $userRepository;

    public function __construct()
    {
        //
    }

    public function uploadFiles(array $files)
    {
        $bucket = Auth::user()->bucket->name;

        foreach($files as $file) {
            MinioService::uploadFile($bucket, $file);
        }
    }
}