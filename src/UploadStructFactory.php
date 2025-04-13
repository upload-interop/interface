<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

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
}
