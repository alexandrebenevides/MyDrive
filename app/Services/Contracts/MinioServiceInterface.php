<?php

namespace App\Services\Contracts;

interface MinioServiceInterface
{
    public function getS3Client();
    public static function createBucket();
    public function bucketExists(string $bucketName);
}