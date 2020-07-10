<?php

namespace GerasimovS\Bitrix24\Middleware;

/**
 * Class Bitrix24
 */
class Bitrix24
{
    protected $parameters = [
        'verify' => VerificationToken::class,
        'remember' => RememberToken::class,
        'auth' => Authenticate::class,
        'webhook' => CheckConfig::class,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $parameter
     *
     * @return mixed
     */
    public function handle($request, \Closure $next, $parameter)
    {
        $middleware = $this->getMiddleware($parameter);

        return (new $middleware)->handle($request, $next);
    }

    /**
     * @param $parameter
     *
     * @return string|void
     */
    public function getMiddleware($parameter)
    {
        if (\array_key_exists($parameter, $this->parameters)) {
            return $this->parameters[$parameter];
        }

        abort(400);
    }
}
