<?php

namespace GerasimovS\Bitrix24\Middleware;

/**
 * Class VerificationToken
 */
class VerificationToken
{
    /**
     * @var \Illuminate\Http\Request $request
     */
    public $request;

    /**
     * @var \Illuminate\Session\Store $session
     */
    public $session;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed|void
     */
    public function handle($request, \Closure $next)
    {
        $this->request = $request;
        $this->session = $request->session();

        if ($this->checkTokens()) {
            $this->putTokensToSession();
            return $next($request);
        }

        abort(401);
    }

    /**
     * Check Bitrix24's tokens in request.
     *
     * @return boolean
     */
    public function checkTokens()
    {
        return $this->request->has('DOMAIN')
            && $this->request->has('AUTH_ID')
            && $this->request->has('REFRESH_ID');
    }

    /**
     * Put Bitrix24's tokens to session.
     */
    public function putTokensToSession()
    {
        $this->session->put('bx24_domain', $this->request->get('DOMAIN'));
        $this->session->put('bx24_access_token', $this->request->get('AUTH_ID'));
        $this->session->put('bx24_refresh_token', $this->request->get('REFRESH_ID'));
    }
}
