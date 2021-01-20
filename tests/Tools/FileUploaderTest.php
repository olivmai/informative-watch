<?php

namespace Test\Tools;

use App\Tools\FileUploader;
use PHPUnit\Framework\TestCase;

/**
 * Class FileUploaderTest
 * @package Test\Tools
 * @covers \App\Tools\FileUploader
 */
class FileUploaderTest extends TestCase
{
    public function testGetCompleteUploadPathForFile(): void
    {
        $filename = "test.jpeg";
        $expectedPath = DEFAULT_UPLOAD_DIR . $filename;

        self::assertEquals($expectedPath, FileUploader::getCompleteUploadPathForFile($filename));
    }
}
