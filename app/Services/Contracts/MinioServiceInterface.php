<?php

namespace App\Services\Contracts;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

interface MinioServiceInterface
{
    public function getS3Client();
    public static function createBucket();
    public function checkBucketExists(string $bucketName);
    public static function uploadFile(string $bucketName, TemporaryUploadedFile $file);
}