# Upload-Interop Standard Interface Package

[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg?style=flat-square)](https://github.com/php-pds/skeleton)
[![PDS Composer Script Names](https://img.shields.io/badge/pds-composer--script--names-blue?style=flat-square)](https://github.com/php-pds/composer-script-names)

Upload-Interop provides an interoperable package of standard interfaces for working with upload structures in PHP 8.4+. It reflects, refines, and reconciles the common practices identified within [several pre-existing projects][README-RESEARCH.md].

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and "OPTIONAL" in this document are to be interpreted as described in [BCP 14][] ([RFC 2119][], [RFC 8174][]).

This package attempts to adhere to the [Package Development Standards](https://php-pds.com/) approach to [naming and versioning](https://php-pds.com/#naming-and-versioning).

## Interfaces

Upload-Interop defines these interfaces:

- [_UploadStruct_][] represents an individual upload.
- [_UploadStructFactory_][] affords creating one or more [_UploadStruct_][] instances.
- [_UploadThrowable_][] marks an [_Exception_][] as upload-related.

Upload-Interop also defines an [_UploadTypeAliases_][] interface with PHPStan types to aid static analysis.

### _UploadStruct_

The [_UploadStruct_][] interface represents the `$_FILES` values for a single uploaded file. It defines these properties:

- `string $tmp_name { get; }`
    - Corresponds to the `'tmp_name'` key in a `files_item_array`.

- `int $error { get; }`
    - Corresponds to the `'error'` key in a `files_item_array`.

- `?string $name { get; }`
    - Corresponds to the `'name'` key in a `files_item_array`.

- `?string $full_path { get; }`
    - Corresponds to the `'full_path'` key in a `files_item_array`.

- `?string $type { get; }`
    - Corresponds to the `'type'` key in a `files_item_array`.

- `?int $size { get; }`
    - Corresponds to the `'size'` key in a `files_item_array`.

Notes:

- **The properties are in `snake_case`, not `camelCase`.** This maintains a direct 1:1 correspondence between the native `$_FILES` array keys and the [_UploadStruct_][] properties.

- **There are no affordances for operating on the uploaded file itself.** Reading from, writing to, moving, copying, renaming, etc. an uploaded file are application-specific concerns, independent from any specific [_UploadStruct_][] implementation.

### _UploadStructFactory_

The _UploadStructFactory_ interface affords creating a single [_UploadStruct_][] instance ...

-
    ```php
    public function newUpload(
        string $tmp_name,
        int $error,
        ?string $name = null,
        ?string $full_path = null,
        ?string $type = null,
        ?int $size = null,
    ) : UploadStruct;
    ```

... or an `uploads_array` of [_UploadStruct_][] instances parsed from `$_FILES` (or its equivalent):

-
    ```php
    public function newUploadsFromFiles(files_array $files) : uploads_array;
    ```

The `uploads_array` index structure returned by `newUploadsFromFiles()` MUST correspond to the structure in which the `files_array` fields were indexed; cf. [README-FILES.md][].

### _UploadThrowable_

The _UploadThrowable_ interface marks an [_Exception_][] as upload-related; it adds no new class members.

### _UploadTypeAliases_

The _UploadTypeAliases_ interface provides these custom PHPStan types to aid static analysis:

- `files_array`: `array<array-key, files_item_array|files_group_array|files_array>` recursively up to 16 dimensions.

- `files_group_array`:
    ```
    array{
        tmp_name:string[],
        error:int[],
        name?:string[],
        full_path?:string[],
        type?:string[],
        size?:int[],
    }
    ```

- `files_item_array`:
    ```
    array{
        tmp_name:string,
        error:int,
        name?:string,
        full_path?:string,
        type?:string,
        size?:int,
    }
    ```

- `uploads_array`: `array<array-key, UploadStruct|uploads_array>` recursively up to 16 dimensions.

Notes:

- **The `files_*` types are defined from the `$_FILES` structure.** Cf. <https://www.php.net/manual/en/features.file-upload.post-method.php>.

## Implementations

Implementations MAY validate [_UploadStruct_][] values; implmentations MUST throw an [_UploadThrowable_][] when a value is invalid.

Implementations advertised as readonly or immutable MUST be deeply readonly or immutable; they MUST NOT encapsulate any references, resources, mutable objects, objects or arrays encapsulating references or resources or mutable objects, and so on.

Implementations MAY define additional class members not defined in these interfaces; implementations advertised as readonly or immutable MUST make those additional class members deeply readonly or immutable.

Notes:

- **Reflection does not invalidate advertisements of readonly or immutable implementations.** The ability of a consumer to use Reflection to mutate an implementation advertised as readonly or immutable does not constitute a failure to comply with Upload-Interop.

- **Reference implementations** are available at <https://github.com/upload-interop/impl>.

## Q & A

## Why a separate Upload-Interop?

Whereas the key structures of `$_GET`, `$_POST`, etc. data structures are not well-defined, the terminating `$_FILES` data structure is well-defined. However, one wants to be able to pass that data structure (or a representation of it) into presentation-independent application or domain logic. As such, one would prefer something that is not tied to a particular presentation format.

For example, embedding the Upload-Interop structures in an HTTP-related standard could reasonably be considered to be tying the structures to the HTTP presentation format. That in turn would make it academically unsuitable for application or domain use.

Thus, Upload-Interop being separated from a particular presentation format gives philosophical cover to using [_UploadStruct_][] instances and the various [_UploadTypeAliases_][] in application or domain logic, much the same way there is cover for using DateTime or SimpleXml instances in application or domain logic.

### Why is there no _UploadCollection_ ?

`$_GET` and `$_POST` user inputs are arbitrarily structured from interaction to interaction. Except for the terminating `files_array_item`, the `$_FILES` user inputs are likewise arbitrarily structured. An `uploads_array` is a representation of that arbitrary structure.

As with other user inputs, it is an application-specific concern to map those arbitrary structures to more well-defined ones, such as domain-specific collections.

## Why are there no mutable or immutable interfaces?

An upload represents user input; the original user input values should be retained unmodified. If consumers need to modify the user input, those modifications should be captured in an application- or domain-specific structure.

* * *

[_Exception_]: https://php.net/Exception
[_UploadStruct_]: #uploadstruct
[_UploadStructFactory_]: #uploadstructfactory
[_UploadThrowable_]: #uploadthrowable
[_UploadTypeAliases_]: #uploadtypealiases
[BCP 14]: https://www.rfc-editor.org/info/bcp14
[README-FILES.md]: ./README-FILES.md
[README-RESEARCH.md]: ./README-RESEARCH.md
[RFC 2119]: https://www.rfc-editor.org/rfc/rfc2119.txt
[RFC 3986]: https://datatracker.ietf.org/doc/html/rfc3986/
[RFC 3987]: https://datatracker.ietf.org/doc/html/rfc3987/
[RFC 8174]: https://www.rfc-editor.org/rfc/rfc8174.txt
