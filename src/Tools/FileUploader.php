<?php

namespace App\Tools;

class FileUploader
{
    public static function upload(array $file): ?string
    {
        $fileInfo = explode('.', basename($file['name']));
        $fileName = StringUtility::slugify($fileInfo[0]) . '.' . $fileInfo[1];

        $uploadFileCompletePath = DEFAULT_UPLOAD_DIR . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $uploadFileCompletePath)) {
            return null;
        }

        return IMG_PUBLIC_DIR . $fileName;
    }
}
