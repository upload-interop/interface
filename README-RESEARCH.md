# Research

Upload-Interop is based on research including the following projects:

- [aura/web](https://github.com/auraphp/Aura.Web/blob/2.x/src/Request/Files.php) (aura)
- Cake 2 _CakeRequest_ (cake2)
- Code Igniter 3 _Ci\_Upload_ (ci3)
- [horde/controller](https://github.com/horde/Controller/blob/horde_controller2/lib/Horde/Controller/Request/Http.php) (horde)
- [joomla/input](https://github.com/joomla-framework/input/blob/3.x-dev/src/Files.php) (joomla)
- [Klein](https://github.com/klein/klein.php/blob/master/src/Klein/DataCollection/DataCollection.php) (klein)
- [Lithium](https://github.com/UnionOfRAD/lithium/blob/1.3/action/Request.php) (lithium)
- [MediaWiki](https://github.com/wikimedia/mediawiki/blob/e45f6a85c0d617884cece009f0252a53d7b1ee53/includes/Request/WebRequestUpload.php) (mediawiki)
- [nette/http](https://github.com/nette/http/blob/master/src/Http/FileUpload.php) (nette)
- [psr/http-message](https://github.com/php-fig/http-message/blob/master/src/UploadedFileInterface.php) (psr)
- [symfony/http-foundation](https://github.com/symfony/http-foundation/blob/6023ec7607254c87c5e69fb3558255aca440d72b/File/UploadedFile.php) (symfony)
- [yiisoft/yii2-dev](https://github.com/yiisoft/yii2/blob/5fb3f809c59f742537df77e0da1ad36a1175834a/framework/web/UploadedFile.php) (yii2)


## Mutability

The projects offer varying levels of mutability:

|           | Readonly | Mutable | Immutable |
| --------- | -------- | ------- | --------- |
| aura      |          | x       |           |
| cake2     |          | x       |           |
| ci3       |          | x       |           |
| horde     | x        |         |           |
| joomla    | x        |         |           |
| klein     |          | x       |           |
| lithium   |          | x       |           |
| mediawiki |          | x       |           |
| nette     | x        |         |           |
| psr       |          |         | x (1)     |
| symfony   | x        |         |           |
| yii2      |          | x       |           |

(1) PSR-7 _UploadedFileInterface_ is only quasi-immutable, as it encapsulates a mutable stream.

## Value Retention and Access

Most of the projects retain the `$_FILES` values as an array, and provide access under the native `$_FILES` array keys (`tmp_name`, `full_path` etc.). However, some of the project provide access using public properties or getter methods:

|           | Native Keys | Public Properties | Getter Methods |
| --------- | ----------- | ----------------- | -------------- |
| aura      | x           |                   |                |
| cake2     | x           |                   |                |
| ci3       |             | x                 |                |
| horde     | x           |                   |                |
| joomla    | x           |                   |                |
| klein     | x           |                   |                |
| lithium   | x           |                   |                |
| mediawiki | x           |                   |                |
| nette     |             |                   | x              |
| psr       |             |                   | x              |
| symfony   |             |                   | x              |
| yii2      |             | x                 |                |

The projects not using native keys use these properties and methods:

|           | `tmp_name`           | `error`      | `name`                    | `full_path`                  | `type`                 | `size`       |
| --------- | -------------------- | ------------ | ------------------------- | ---------------------------- | ---------------------- | ------------ |
| ci3       | `$file_temp`         | `$error_msg` | `$file_name`              | `$upload_path`               | `$file_type`           | `$file_size` |
| nette     | `getTemporaryFile()` | `getError()` | `getUntrustedName()`      | `getUntrustedFullPath()`     | `getContentType()`     | `getSize()`  |
| psr       | via `getStream()`    | `getError()` | `getClientFilename()`     | - (1)                        | `getClientMediaType()` | `getSize()`  |
| symfony   | `getPathName()`      | `getError()` | `getClientOriginalName()` | `getClientOriginalPath()`    | `getClientMimeType()`  | `getSize()`  |
| yii2      | `$tempName`          | `$error`     | `$name`                   | `$fullPath`                  | `$type`                | `$size`      |

(1) PSR-7 _UploadedFileInterface_ does not provide access to the uploaded file `full_path` value.

## Normalization of `$_FILES`

Some projects retain the `$_FILES` array as given by PHP, while others normalize or rearrange it to make it look more like `$_POST`.

|           | Normalizes `$_FILES` |
| --------- | -------------------- |
| aura      | x                    |
| cake2     | x                    |
| ci3       |                      |
| horde     |                      |
| joomla    |                      |
| klein     |                      |
| lithium   | x                    |
| mediawiki |                      |
| nette     | x                    |
| psr       | x                    |
| symfony   | x                    |
| yii2      | x                    |

## Read Body Content

These projects provide a method to read the body content of the uploaded file:

|           | Read Body Content        |
| --------- | ------------------------ |
| aura      |                          |
| cake2     |                          |
| ci3       |                          |
| horde     |                          |
| joomla    |                          |
| klein     |                          |
| lithium   |                          |
| mediawiki |                          |
| nette     | `getContents() : string` |
| psr       | via `getStream()`        |
| symfony   | `getContent() : string`  |
| yii2      |                          |

## File Movement

These projects provide a method to move, copy, or rename the uploaded file:


|           | Move/Copy/Rename Uploaded File                         |
| --------- | ------------------------------------------------------ |
| aura      |                                                        |
| cake2     |                                                        |
| ci3       | `do_upload()`                                          |
| horde     |                                                        |
| joomla    |                                                        |
| klein     |                                                        |
| lithium   |                                                        |
| mediawiki |                                                        |
| nette     | `move(string $dest) : $this`                           |
| psr       | `moveTo(string $dest) : void`                          |
| symfony   | `move(string $directory, ?string $name = null) : File` |
| yii2      | `saveAs($file, $deleteTempFile = true) : bool`         |

* * *
