<?php

namespace App\Services\Settings;

use ErrorException;

class Settings
{
    public function disableWarnings()
    {
        set_error_handler(function ($errno, $errStr, $errFile, $errLine) {

            if (0 === error_reporting()) {
                return false;
            }

            throw new ErrorException($errStr, 0, $errno, $errFile, $errLine);
        });
    }
}