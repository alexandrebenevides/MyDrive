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

    public function createFolder(string $folderName)
    {
        $bucket = Auth::user()->bucket->name;
        MinioService::createFolder($bucket, $folderName);
    }

    public function getListTree()
    {
        $bucket = Auth::user()->bucket->name;
        return MinioService::listFoldersAndFiles($bucket);
    }

    public function getFilesFromPath(array $pathStack)
    {
        $listTree = $this->getListTree();
        $currentList = $listTree;

        foreach ($pathStack as $path) {
            if (!empty($path)){
                $currentList = $currentList[$path];
            }
        }

        unset($currentList['size'], $currentList['lastModified'], $currentList['objectKey']);

        return $currentList;
    }

    public function removeItem(string $objectKey)
    {
        $bucket = Auth::user()->bucket->name;
        MinioService::removeItem($bucket, $objectKey);
    }
}