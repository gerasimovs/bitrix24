<?php

namespace GerasimovS\Bitrix24\Middleware;

use Closure;
use Illuminate\Http\Request;
use GerasimovS\Bitrix24\Rest;

class RememberToken
{
    /**
     * @var $session
     */
    public $session;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->session = $request->session();

        if ($this->setTokens()) {
            return $next($request);
        }

        abort(401);
    }

    /**
     * Check request Bitrix24's tokens parameters.
     *
     * @return boolean
     */
    public function setTokens()
    {
        if (
            $this->session->has('bx24_domain')
            && $this->session->has('bx24_access_token')
            && $this->session->has('bx24_refresh_token')
        ) {
            $rest = Rest::getInstance();
            $rest->setDomain($this->session->get('bx24_domain'));
            $rest->setAccessToken($this->session->get('bx24_access_token'));
            $rest->setRefreshToken($this->session->get('bx24_refresh_token'));
            $rest->setClientId(config('bitrix24.client_id'));
            $rest->setClientSecret(config('bitrix24.client_secret'));
            return true;
        }

        return false;
    }
}
