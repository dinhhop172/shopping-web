<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->user()->id, $fileNameHash);
            $data = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath),
            ];
            return $data;
        }
        return null;
    }

    public function storageTraitUploadMutiple($fileName, $folderName)
    {
        $fileNameOrigin = $fileName->getClientOriginalName();
        $fileNameHash = Str::random(20) . '.' . $fileName->getClientOriginalExtension();
        $filePath = $fileName->storeAs('public/' . $folderName . '/' . auth()->user()->id, $fileNameHash);
        $data = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath),
        ];
        return $data;
    }

    public function luuAnh()
    {
        
    }
}
