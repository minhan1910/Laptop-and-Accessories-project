<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldName, $folderName)
    {

        if (!$request->hasFile($fieldName))
            return null;

        $file = $request->file($fieldName);
        $fileFolder = 'public/' . $folderName . '/' . Auth::user()->id;
        $fileNameHash = $file->hashName();
        $fileNameOrigin = $file->getClientOriginalName();

        $filePath = Storage::putFileAs(
            $fileFolder,
            $file,
            $fileNameHash,
        );

        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath),
        ];

        return $dataUploadTrait;
    }

    public function storageTraitUploadMultiple($file, $folderName)
    {
        $fileFolder = 'public/' . $folderName . '/' . Auth::user()->id;
        $fileNameHash = $file->hashName();
        $fileNameOrigin = $file->getClientOriginalName();

        $filePath = Storage::putFileAs(
            $fileFolder,
            $file,
            $fileNameHash,
        );

        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath),
        ];

        return $dataUploadTrait;
    }
}