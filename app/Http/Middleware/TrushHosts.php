<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrushHosts extends Middleware
{


public function hoots(): array
{
    return [
        $this->allSubdomainsOfApplicationUrl()
    ];
}

}