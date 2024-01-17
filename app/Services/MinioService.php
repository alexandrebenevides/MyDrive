<?php

namespace App\Services;

use App\Services\Contracts\MinioServiceInterface;
use Aws\S3\S3Client;
use Str;

class MinioService implements MinioServiceInterface
{
    public function getS3Client()
    {
        return new S3Client([
            'region' => env('MINIO_REGION'),
            'endpoint' => env('MINIO_HOST'),
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => env('MINIO_KEY'),
                'secret' => env('MINIO_SECRET'),
            ],
        ]);
    }

    public static function createBucket()
    {
        $client = (new self())->getS3Client();
        $bucketName = Str::lower(Str::random(32));
        
        while((new self())->bucketExists($bucketName)) {
            $bucketName = Str::lower(Str::random(32));
        }

        $client->createBucket(['Bucket' => $bucketName]);
        return $bucketName;
    }

    public function bucketExists(string $bucketName)
    {
        $client = (new self())->getS3Client();

        try {
            $client->headBucket(['Bucket' => $bucketName]);
            return true;
        } catch (\Aws\S3\Exception\S3Exception $e) {
            return false;
        }
    }
}