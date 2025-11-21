<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

/**
 * @phpstan-import-type upload_files_array from UploadTypeAliases
 *
 * @phpstan-import-type upload_struct_array from UploadTypeAliases
 */
interface UploadStructFactory
{
    public function newUpload(
        string $tmp_name,
        int $error,
        ?string $name = null,
        ?string $full_path = null,
        ?string $type = null,
        ?int $size = null,
    ) : UploadStruct;

    /**
     * @param upload_files_array $files
     * @return upload_struct_array
     */
    public function newUploadsFromFiles(array $files) : array;
}
