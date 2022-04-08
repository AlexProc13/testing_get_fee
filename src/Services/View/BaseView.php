<?php

namespace App\Services\View;

class BaseView extends ViewService
{
    public function view($result): void
    {
        echo $result;
        print "\n";
    }
}