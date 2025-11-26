<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

/**
 * The [_UploadStruct_][] interface represents the `$_FILES` values for a single
 * uploaded file.
 *
 * - Directives:
 *
 *     - Implementations MAY validate [_UploadStruct_][] values; implementations
 *       doing so MUST throw an [_UploadThrowable_][] when a value is invalid.

 * - Notes:
 *
 *     - **The interface defines property hooks for `get` but not `set`.** The
 *       interface only guarantees readability; writability is outside the scope
 *       of this package.
 *
 *     - **The properties are in `snake_case`, not `camelCase`.** This maintains
 *       a direct 1:1 correspondence between the native `$_FILES` array keys and
 *       the [_UploadStruct_][] properties.
 *
 *     - **There are no affordances for operating on the uploaded file itself.**
 *       Reading from, writing to, moving, copying, renaming, etc. an uploaded
 *       file are application-specific concerns, independent from any specific
 *       [_UploadStruct_][] implementation.
 */
interface UploadStruct
{
    /**
     * Corresponds to the `'tmp_name'` key in an `upload_files_item_array`.
     */
    public string $tmp_name { get; }

    /**
     * Corresponds to the `'error'` key in an `upload_files_item_array`.
     */
    public int $error { get; }

    /**
     * Corresponds to the `'name'` key in an `upload_files_item_array`.
     */
    public ?string $name { get; }

    /**
     * Corresponds to the `'full_path'` key in an `upload_files_item_array`.
     */
    public ?string $full_path { get; }

    /**
     * Corresponds to the `'type'` key in an `upload_files_item_array`.
     */
    public ?string $type { get; }

    /**
     * Corresponds to the `'size'` key in an `upload_files_item_array`.
     */
    public ?int $size { get; }
}
