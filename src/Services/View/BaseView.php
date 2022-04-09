<?php

namespace App\Services\View;

class BaseView extends ViewService
{
    public function view($result, $lineBreak = "\n"): void
    {
        print $result . $lineBreak;
    }
}
