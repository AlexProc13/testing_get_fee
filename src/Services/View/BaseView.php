<?php

namespace App\Services\View;

class BaseView extends ViewService
{
    public function view($result)
    {
        echo $result;
        print "\n";
    }
}