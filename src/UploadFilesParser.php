<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

/**
 * @phpstan-import-type files_array from UploadTypeAliases
 * @phpstan-import-type uploads_array from UploadTypeAliases
 */
interface UploadFilesParser
{
    /**
     * @param files_array $files
     * @return uploads_array
     */
    public function parseUploadFiles(array $files) : array;
}
