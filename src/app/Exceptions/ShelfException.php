<?php

namespace App\Exceptions;

use Exception;

class ShelfException extends Exception
{
    const ALREADY_EXISTS                              = 1;
    const INVALID_REQUEST                             = 2;
    const INTERNAL_SERVER_ERROR                       = 3;
    const IS_REFERRED                                 = 4;
    const RESOURCE_NOT_FOUND                          = 5;
    const NOT_ENOUGH_PERMISSION                       = 6;
    const NOT_OWNER                                   = 7;

    const COLLECTION_NOT_ACTIVATED                    = 11;
    const COLLECTION_ALREADY_ACTIVATED                = 12;
    const COLLECTION_NOT_FOUND                        = 13;
    const COLLECTION_API_KEY_ONETIME_CODE_IS_EXPIRED  = 14;
    const COLLECTION_API_KEY_ONETIME_CODE_NOT_MATCHED = 15;

    const SHELF_UPLOAD_FAILED                         = 21;
    const SHELF_STORE_FAILED                          = 22;

    public function __construct(string $message, int $code, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
