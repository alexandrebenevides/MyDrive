<?php

namespace App\Services\Contracts;

interface MyFilesServiceInterface
{
    public function uploadFiles(array $files, string $path);
    public function createFolder(string $folderName, string $path);
    public function getListTree();
    public function getFilesFromPath(array $pathStack);
    public function removeItem(string $objectKey);
    public function getObject(string $objectKey);
}