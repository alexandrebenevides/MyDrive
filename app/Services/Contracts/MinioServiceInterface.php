<?php

namespace App\Services\Contracts;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

interface MinioServiceInterface
{
    public function getS3Client();
    public static function createBucket();
    public function checkBucketExists(string $bucketName);
    public static function uploadFile(string $bucketName, string $path, TemporaryUploadedFile $file);
    public static function createFolder(string $bucketName, string $path, string $folderName);
    public static function listFoldersAndFiles(string $bucketName);
    public static function removeItem(string $bucketName, string $objectKey);
}