<?php

namespace GerasimovS\Bitrix24\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificationToken
{
    /**
     * @var Request $request
     */
    public $request;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->request = $request;

        if ($this->checkTokens()) {
            return $next($request);
        }

        abort(401);
    }

    /**
     * Check request Bitrix24's tokens parameters.
     *
     * @return boolean
     */
    public function checkTokens()
    {
        if (
            $this->request->has('DOMAIN')
            && $this->request->has('AUTH_ID')
            && $this->request->has('REFRESH_ID')
        ) {
            $session = $this->request->session();
            $session->put('bx24_domain', $this->request->DOMAIN);
            $session->put('bx24_access_token', $this->request->AUTH_ID);
            $session->put('bx24_refresh_token', $this->request->REFRESH_ID);

            return true;
        }

        return false;
    }
}
