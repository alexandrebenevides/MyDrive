<?php

namespace App\Services;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Exceptions\UploadFileException;
use App\Exceptions\CreateFolderException;
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
        
        while((new self())->checkBucketExists($bucketName)) {
            $bucketName = Str::lower(Str::random(32));
        }

        $client->createBucket(['Bucket' => $bucketName]);
        return $bucketName;
    }

    public function checkBucketExists(string $bucketName)
    {
        $client = (new self())->getS3Client();

        try {
            $client->headBucket(['Bucket' => $bucketName]);
            return true;
        } catch (\Aws\S3\Exception\S3Exception $e) {
            return false;
        }
    }

    public static function uploadFile(string $bucketName, TemporaryUploadedFile $file)
    {
        $client = (new self())->getS3Client();

        $result = $client->putObject([
            'Bucket' => $bucketName,
            'Key' => $file->getClientOriginalName(),
            'Body' => fopen($file->path(), 'rb'),
            'ACL' => 'private',
        ]);

        if ($result->get('@metadata')['statusCode'] == 200) {
            return true;
        }

        throw new UploadFileException('Erro ao enviar o arquivo: ' . $file->getClientOriginalName());
    }

    public static function createFolder(string $bucketName, string $folderName)
    {
        $client = (new self())->getS3Client();

        $result = $client->putObject([
            'Bucket' => $bucketName,
            'Key'    => $folderName . '/',
            'Body'   => '',
        ]);

        if ($result->get('@metadata')['statusCode'] == 200) {
            return true;
        }

        throw new CreateFolderException('Erro ao criar pasta: ' . $folderName);
    }

    public static function listFoldersAndFiles(string $bucketName)
    {
        $client = (new self())->getS3Client();

        $result = $client->listObjectsV2([
            'Bucket' => $bucketName
        ]);
    
        $listTree = [];
        foreach ($result['Contents'] ?? [] as $objeto) {
            $path = $objeto['Key'];
            $size = $objeto['Size'];
            $lastModified = $objeto['LastModified'];
    
            $slices = explode('/', $path);
            $current = &$listTree;
    
            foreach ($slices as $slice) {
                if (!empty($slice)) {
                    $current = &$current[$slice];
                }
            }
    
            $current['size'] = $size;
            $current['lastModified'] = $lastModified;
        }

        return $listTree;
    }
}