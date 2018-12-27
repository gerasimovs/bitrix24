<?php

namespace GerasimovS\Bitrix24\Middleware;

use Closure;
use GerasimovS\Bitrix24\Rest;

class CheckConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->checkTokens()) {
            $this->createRestInstance();
            return $next($request);
        }

        abort(403);
    }

    /**
     * Check Bitrix24's tokens in session.
     *
     * @return boolean
     */
    public function checkTokens()
    {
        if (config('bitrix24.webhook')) {
            return true;
        }
    }

    public function createRestInstance()
    {
        $rest = Rest::getInstance();
        $rest->setAccessHook(config('bitrix24.webhook'));
    }
}
