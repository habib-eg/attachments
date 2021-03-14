<?php


namespace Habib\Attachment;
use Illuminate\Support\Facades\Route;

class Router{

    /**
     * @param string $prefix
     * @param array $middleware
     * @return Router
     */

    public static function routes(string $prefix='',array $middleware=[]){
        // set prefix && set middleware
        Route::prefix(config('attachment.route_prefix',$prefix))->namespace('\Habib\Attachment\Http\Controllers')->middleware(config('attachment.middleware',$middleware))->group(function (){

        });
        return new self() ;
    }

}
