<?php

namespace GerasimovS\Bitrix24\Middleware;

use GerasimovS\Bitrix24\Rest;

/**
 * Class CheckConfig
 */
class CheckConfig
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed|void
     * @throws \Exception
     */
    public function handle($request, \Closure $next)
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
     * @return boolean|void
     */
    public function checkTokens()
    {
        if (config('bitrix24.webhook')) {
            return true;
        }
    }

    /**
     * @return Rest
     * @throws \Exception
     */
    public function createRestInstance()
    {
        $rest = Rest::getInstance();
        $rest->setAccessHook(config('bitrix24.webhook'));

        return $rest;
    }
}
