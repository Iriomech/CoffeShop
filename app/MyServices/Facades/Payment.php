<?php

namespace App\MyServices\Facades;

use Illuminate\Support\Facades\Facade;

class Payment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return '\App\MyServices\Payment';
    }
}
