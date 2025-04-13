<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

interface UploadStruct
{
    public string $tmp_name { get; }

    public int $error { get; }

    public ?string $name { get; }

    public ?string $full_path { get; }

    public ?string $type { get; }

    public ?int $size { get; }
}
