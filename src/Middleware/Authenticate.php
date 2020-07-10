<?php

namespace GerasimovS\Bitrix24\Middleware;

use GerasimovS\Bitrix24\Rest;

/**
 * Class Authenticate
 */
class Authenticate
{
    /**
     * @var \Illuminate\Session\Store $session
     */
    public $session;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed|void
     */
    public function handle($request, \Closure $next)
    {
        $this->session = $request->session();

        if ($this->checkTokens()) {
            $this->createRestInstance();
            return $next($request);
        }

        abort(401);
    }

    /**
     * Check Bitrix24's tokens in session.
     *
     * @return boolean
     */
    public function checkTokens()
    {
        return $this->session->has('bx24_domain')
            && $this->session->has('bx24_access_token')
            && $this->session->has('bx24_refresh_token');
    }

    /**
     * @return Rest
     */
    public function createRestInstance()
    {
        $rest = Rest::getInstance();
        $rest->setDomain($this->session->get('bx24_domain'));
        $rest->setAccessToken($this->session->get('bx24_access_token'));
        $rest->setRefreshToken($this->session->get('bx24_refresh_token'));
        $rest->setClientId(config('bitrix24.client_id'));
        $rest->setClientSecret(config('bitrix24.client_secret'));

        return $rest;
    }
}
