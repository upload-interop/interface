<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

/**
 * @phpstan-type files_array    array<array-key, files_group_array|files_item_array|files_array_00>
 * @phpstan-type files_array_00 array<array-key, files_group_array|files_item_array|files_array_01>
 * @phpstan-type files_array_01 array<array-key, files_group_array|files_item_array|files_array_02>
 * @phpstan-type files_array_02 array<array-key, files_group_array|files_item_array|files_array_03>
 * @phpstan-type files_array_03 array<array-key, files_group_array|files_item_array|files_array_04>
 * @phpstan-type files_array_04 array<array-key, files_group_array|files_item_array|files_array_05>
 * @phpstan-type files_array_05 array<array-key, files_group_array|files_item_array|files_array_06>
 * @phpstan-type files_array_06 array<array-key, files_group_array|files_item_array|files_array_07>
 * @phpstan-type files_array_07 array<array-key, files_group_array|files_item_array|files_array_08>
 * @phpstan-type files_array_08 array<array-key, files_group_array|files_item_array|files_array_09>
 * @phpstan-type files_array_09 array<array-key, files_group_array|files_item_array|files_array_0A>
 * @phpstan-type files_array_0A array<array-key, files_group_array|files_item_array|files_array_0B>
 * @phpstan-type files_array_0B array<array-key, files_group_array|files_item_array|files_array_0C>
 * @phpstan-type files_array_0C array<array-key, files_group_array|files_item_array|files_array_0D>
 * @phpstan-type files_array_0D array<array-key, files_group_array|files_item_array|files_array_0E>
 * @phpstan-type files_array_0E array<array-key, files_group_array|files_item_array|files_array_0F>
 * @phpstan-type files_array_0F array<array-key, files_group_array|files_item_array>
 *
 * @phpstan-type files_group_array array{
 *     tmp_name:string[],
 *     error:int[],
 *     name?:string[],
 *     full_path?:string[],
 *     type?:string[],
 *     size?:int[],
 * }
 *
 * @phpstan-type files_item_array array{
 *     tmp_name:string,
 *     error:int,
 *     name?:string,
 *     full_path?:string,
 *     type?:string,
 *     size?:int,
 * }
 *
 * @phpstan-type uploads_array    array<array-key, UploadStruct|uploads_array_00>
 * @phpstan-type uploads_array_00 array<array-key, UploadStruct|uploads_array_01>
 * @phpstan-type uploads_array_01 array<array-key, UploadStruct|uploads_array_02>
 * @phpstan-type uploads_array_02 array<array-key, UploadStruct|uploads_array_03>
 * @phpstan-type uploads_array_03 array<array-key, UploadStruct|uploads_array_04>
 * @phpstan-type uploads_array_04 array<array-key, UploadStruct|uploads_array_05>
 * @phpstan-type uploads_array_05 array<array-key, UploadStruct|uploads_array_06>
 * @phpstan-type uploads_array_06 array<array-key, UploadStruct|uploads_array_07>
 * @phpstan-type uploads_array_07 array<array-key, UploadStruct|uploads_array_08>
 * @phpstan-type uploads_array_08 array<array-key, UploadStruct|uploads_array_09>
 * @phpstan-type uploads_array_09 array<array-key, UploadStruct|uploads_array_0A>
 * @phpstan-type uploads_array_0A array<array-key, UploadStruct|uploads_array_0B>
 * @phpstan-type uploads_array_0B array<array-key, UploadStruct|uploads_array_0C>
 * @phpstan-type uploads_array_0C array<array-key, UploadStruct|uploads_array_0D>
 * @phpstan-type uploads_array_0D array<array-key, UploadStruct|uploads_array_0E>
 * @phpstan-type uploads_array_0E array<array-key, UploadStruct|uploads_array_0F>
 * @phpstan-type uploads_array_0F array<array-key, string>
 */
interface UploadTypeAliases
{
}
