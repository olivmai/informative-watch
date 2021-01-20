<?php

namespace App\Tools;

class FileUploader
{
    public static function upload(array $file): ?string
    {
        $fileInfo = StringUtility::getArrayFromString(basename($file['name']));
        $fileName = StringUtility::slugify($fileInfo[0]) . '.' . $fileInfo[1];

        $uploadFileCompletePath = self::getCompleteUploadPathForFile($fileName);

        if (!move_uploaded_file($file['tmp_name'], $uploadFileCompletePath)) {
            return null;
        }

        return IMG_PUBLIC_DIR . $fileName;
    }

    public static function getCompleteUploadPathForFile(string $filename): string
    {
        return DEFAULT_UPLOAD_DIR . $filename;
    }
}
