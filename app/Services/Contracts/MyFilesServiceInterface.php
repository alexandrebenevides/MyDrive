<?php

namespace App\Services\Contracts;

interface MyFilesServiceInterface
{
    public function uploadFiles(array $files);
    public function createFolder(string $folderName);
}