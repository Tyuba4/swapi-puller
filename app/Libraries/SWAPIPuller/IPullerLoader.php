<?php

namespace App\Libraries\SWAPIPuller;

use Illuminate\Support\Collection;

interface IPullerLoader
{
    public function getPullers() :Collection;
}
