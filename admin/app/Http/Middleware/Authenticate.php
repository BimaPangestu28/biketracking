<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use \App\Libs\Response as Response;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $this->response = new Response();

        if (explode("/", $request->route()->uri)[0] == "api") {
            if (!$request->expectsJson()) {
                return abort($this->response->failed_response("Unauthorized", [], 403));
            }
        } else {
            if (!$request->expectsJson()) {
                return route('login');
            }
        }
    }
}
