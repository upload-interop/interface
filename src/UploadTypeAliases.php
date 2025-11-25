<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

/**
 * @phpstan-type upload_files_array    array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_00>
 * @phpstan-type upload_files_array_00 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_01>
 * @phpstan-type upload_files_array_01 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_02>
 * @phpstan-type upload_files_array_02 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_03>
 * @phpstan-type upload_files_array_03 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_04>
 * @phpstan-type upload_files_array_04 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_05>
 * @phpstan-type upload_files_array_05 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_06>
 * @phpstan-type upload_files_array_06 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_07>
 * @phpstan-type upload_files_array_07 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_08>
 * @phpstan-type upload_files_array_08 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_09>
 * @phpstan-type upload_files_array_09 array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_0A>
 * @phpstan-type upload_files_array_0A array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_0B>
 * @phpstan-type upload_files_array_0B array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_0C>
 * @phpstan-type upload_files_array_0C array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_0D>
 * @phpstan-type upload_files_array_0D array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_0E>
 * @phpstan-type upload_files_array_0E array<array-key, upload_files_group_array|upload_files_item_array|upload_files_array_0F>
 * @phpstan-type upload_files_array_0F array<array-key, upload_files_group_array|upload_files_item_array>
 *
 * @phpstan-type upload_files_group_array array{
 *     tmp_name:string[],
 *     error:int[],
 *     name?:string[],
 *     full_path?:string[],
 *     type?:string[],
 *     size?:int[],
 * }
 *
 * @phpstan-type upload_files_item_array array{
 *     tmp_name:string,
 *     error:int,
 *     name?:string,
 *     full_path?:string,
 *     type?:string,
 *     size?:int,
 * }
 *
 * @phpstan-type upload_structs_array    array<array-key, UploadStruct|upload_structs_array_00>
 * @phpstan-type upload_structs_array_00 array<array-key, UploadStruct|upload_structs_array_01>
 * @phpstan-type upload_structs_array_01 array<array-key, UploadStruct|upload_structs_array_02>
 * @phpstan-type upload_structs_array_02 array<array-key, UploadStruct|upload_structs_array_03>
 * @phpstan-type upload_structs_array_03 array<array-key, UploadStruct|upload_structs_array_04>
 * @phpstan-type upload_structs_array_04 array<array-key, UploadStruct|upload_structs_array_05>
 * @phpstan-type upload_structs_array_05 array<array-key, UploadStruct|upload_structs_array_06>
 * @phpstan-type upload_structs_array_06 array<array-key, UploadStruct|upload_structs_array_07>
 * @phpstan-type upload_structs_array_07 array<array-key, UploadStruct|upload_structs_array_08>
 * @phpstan-type upload_structs_array_08 array<array-key, UploadStruct|upload_structs_array_09>
 * @phpstan-type upload_structs_array_09 array<array-key, UploadStruct|upload_structs_array_0A>
 * @phpstan-type upload_structs_array_0A array<array-key, UploadStruct|upload_structs_array_0B>
 * @phpstan-type upload_structs_array_0B array<array-key, UploadStruct|upload_structs_array_0C>
 * @phpstan-type upload_structs_array_0C array<array-key, UploadStruct|upload_structs_array_0D>
 * @phpstan-type upload_structs_array_0D array<array-key, UploadStruct|upload_structs_array_0E>
 * @phpstan-type upload_structs_array_0E array<array-key, UploadStruct|upload_structs_array_0F>
 * @phpstan-type upload_structs_array_0F array<array-key, string>
 */
interface UploadTypeAliases
{
}
