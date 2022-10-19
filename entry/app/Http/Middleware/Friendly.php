<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ResponseMessages;
use Illuminate\Contracts\Config\Repository as ConfigContract;

class Friendly
{
    private string $key;

    /**
     * @param ConfigContract $conf
     * @param string $key
     */
    public function __construct(ConfigContract $conf)
    {
        $this->key = $conf->get('sanctum.secret_key');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!isset($this->key) || $request->header('key') != $this->key) {
            return response([
                'message' => trans(ResponseMessages::WRONG_CREDENTIALS),
            ], Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
