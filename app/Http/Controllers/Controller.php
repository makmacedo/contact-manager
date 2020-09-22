<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** 
     * Display the list of API routes.
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function routes() 
    {
        Artisan::call('route:list -c --json --path=api');

        return response(Artisan::output());
    }
}
