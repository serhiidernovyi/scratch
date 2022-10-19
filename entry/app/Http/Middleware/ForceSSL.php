<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class ForceSSL
{
    /**
     * @var Application
     */
    private $app;
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $this->app->isLocal()) {
            \URL::forceScheme('https');
        }
        return $next($request);
    }
}
