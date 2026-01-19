# Upload-Interop Standard Interface Package

[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg?style=flat-square)](https://github.com/php-pds/skeleton)
[![PDS Composer Script Names](https://img.shields.io/badge/pds-composer--script--names-blue?style=flat-square)](https://github.com/php-pds/composer-script-names)

Upload-Interop provides an interoperable package of standard interfaces for working with upload structures in PHP 8.4+. It reflects, refines, and reconciles the common practices identified within [several pre-existing projects][README-RESEARCH.md].

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and "OPTIONAL" in this document are to be interpreted as described in [BCP 14][] ([RFC 2119][], [RFC 8174][]).

This package attempts to adhere to the [Package Development Standards](https://php-pds.com/) approach to [naming and versioning](https://php-pds.com/#naming-and-versioning).

## Interfaces

Upload-Interop defines these interfaces:

- [_UploadStruct_][] represents the `$_FILES` values for a single uploaded file.
- [_UploadStructFactory_][] affords creating one or more [_UploadStruct_][] instances.
- [_UploadThrowable_][] extends [_Throwable_][] to mark an [_Exception_][] as upload-related.
- [_UploadTypeAliases_][] provides custom PHPStan types to aid static analysis.

{{= docs }}

## Implementations

- Directives:

    - Implementations advertised as readonly or immutable MUST be deeply
      readonly or immutable; they MUST NOT encapsulate any references,
      resources, mutable objects, objects or arrays encapsulating references or
      resources or mutable objects, and so on.

    - Implementations MAY define additional class members not defined in these
      interfaces; implementations advertised as readonly or immutable MUST make
      those additional class members deeply readonly or immutable.

- Notes:

    - **Reflection does not invalidate advertisements of readonly or immutable
      implementations.** The ability of a consumer to use Reflection to mutate
      an implementation advertised as readonly or immutable does not constitute
      a failure to comply with Upload-Interop.

    - **Reference implementations** are available at <https://github.com/upload-interop/impl>.

## Q & A

### Why a separate Upload-Interop?

Whereas the key structures of `$_GET`, `$_POST`, etc. superglobal arrays are not well-defined, the terminating `upload_files_array_item` data structure in the `$_FILES` superglobal **is** well-defined. However, one wants to be able to pass that data structure (or a representation of it) into presentation-independent application or domain logic. As such, one would prefer something that is not tied to a particular presentation format.

For example, embedding the Upload-Interop structures in an HTTP-related standard could reasonably be considered to be tying the structures to the HTTP presentation format. That in turn would make Upload-Interop academically unsuitable for application or domain use.

Thus, Upload-Interop being separated from a particular presentation format gives philosophical cover to using [_UploadStruct_][] instances and the various [_UploadTypeAliases_][] in application or domain logic, much the same way there is cover for using [_DateTime_][] or [_SimpleXmlElement_][] instances in application or domain logic.

### Why is there no _UploadCollection_ ?

`$_GET` and `$_POST` user inputs are arbitrarily structured from interaction to interaction. Except for the terminating `upload_files_array_item`, the `$_FILES` user inputs are likewise arbitrarily structured. An `upload_structs_array` is a representation of that arbitrary structure.

As with other user inputs, it is an application-specific concern to map those arbitrary structures to more well-defined ones, such as domain-specific collections.

### Why is it an _Upload*Struct*_ and not just an _Upload_ ?

Upload-Interop wants to avoid _Interface_ suffixes, and wants to avoid making implementors use import aliases. Calling it an _Upload_ would mean any implementation also called _Upload_ would have to alias the interop interface. It is the difference between this less-preferable alternative ...

```php
use UploadInterop\Interface\Upload as UploadInteropInterface;

class Upload implements UploadInteropInterface
{
    // ...
}
```

... and this more-preferable one:


```php
use UploadInterop\Interface\UploadStruct;

class Upload implements UploadStruct
{
    // ...
}
```


Further, the interface is struct-like in that it is composed only of properties.

It is true that none of the researched implementations use _Struct_ in their naming; but then, the interop is for the interface, so existing implementation names can remain as they are.

* * *

[_DateTime_]: https://www.php.net/manual/en/class.datetime.php
[_Exception_]: https://php.net/Exception
[_SimpleXmlElement_]: https://www.php.net/manual/en/class.simplexmlelement.php
[_Throwable_]: https://php.net/Throwable
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
