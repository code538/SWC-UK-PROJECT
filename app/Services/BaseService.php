<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BaseService
{
    protected function fileUrl(?string $path): ?string
    {
        if (empty($path)) {
            return null;
        }

        return asset('storage/' . ltrim($path, '/'));
    }

    protected function uploadFile(
        UploadedFile $file,
        string $folder
    ): string {
        $fileName = time() . '_' . uniqid() . '.' .
            $file->getClientOriginalExtension();

        $file->storeAs(
            $folder,
            $fileName,
            'public'
        );

        return $folder . '/' . $fileName;
    }

    protected function deleteFile(?string $path): bool
    {
        if (
            empty($path) ||
            !Storage::disk('public')->exists($path)
        ) {
            return false;
        }

        return Storage::disk('public')->delete($path);
    }
}