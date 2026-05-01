<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

/**
 * [_UploadStructFactory_][] affords creating one or more [_UploadStruct_][]
 * instances.
 *
 * @phpstan-import-type upload_files_array from UploadTypeAliases
 * @phpstan-import-type upload_structs_array from UploadTypeAliases
 */
interface UploadStructFactory
{
    /**
     * Creates a single [_UploadStruct_][] instance.
     */
    public function newUpload(
        string $tmp_name,
        int $error,
        ?string $name = null,
        ?string $full_path = null,
        ?string $type = null,
        ?int $size = null,
    ) : UploadStruct;

    /**
     * Creates an `upload_structs_array` of [_UploadStruct_][] instances parsed
     * from an `upload_files_array`.
     *
     * - Directives:
     *
     *     - Implementations MUST return an `upload_structs_array` index
     *       structure that corresponds to the structure in which the
     *       `upload_files_array` fields were indexed; cf. [README-FILES.md][].
     *
     * @param upload_files_array $files
     * @return upload_structs_array
     */
    public function newUploadsFromFiles(array $files) : array;
}
