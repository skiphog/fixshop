<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Contracts\Support\Responsable;

class SetCookieCart
{
    public function handle(Request $request, Closure $next)
    {
        if (!($cart = $request->cookie('cart')) || !Str::isUuid($cart)) {
            $request->cookies->set('cart', (string)Str::uuid());

            return tap($next($request), function ($response) use ($request) {
                $this->addCookieToResponse($request, $response);
            });
        }

        return $next($request);
    }

    protected function addCookieToResponse(Request $request, $response)
    {
        $config = config('session');

        if ($response instanceof Responsable) {
            $response = $response->toResponse($request);
        }

        $response->headers->setCookie($this->newCookie($request, $config));

        return $response;
    }

    protected function newCookie($request, $config): Cookie
    {
        return new Cookie(
            'cart',
            $request->cookie('cart'),
            0x7FFFFFFF,
            $config['path'],
            $config['domain'],
            $config['secure'],
            true,
            false,
            $config['same_site']
        );
    }
}
