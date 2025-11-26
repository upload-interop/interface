<?php
declare(strict_types=1);

namespace UploadInterop\Interface;

use Throwable;

/**
 * The [_UploadThrowable_][] interface extends [_Throwable_][] to mark an
 * [_Exception_][] as upload-related. It adds no class members.
 */
interface UploadThrowable extends Throwable
{
}
