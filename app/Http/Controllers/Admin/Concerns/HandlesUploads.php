<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesUploads
{
    protected function upload(?UploadedFile $file, string $folder, ?string $old = null): ?string
    {
        if (! $file) {
            return $old;
        }

        if ($old) {
            Storage::disk('public')->delete($old);
        }

        return $file->store($folder, 'public');
    }

    protected function deleteFile(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
