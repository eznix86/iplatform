<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Str;
use Symfony\Component\HttpFoundation\Response;

class ConvertRequestFieldsToCamelCase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $replaced = $this->convertKeysToSnakeCase($request->all());
        $request->replace($replaced);

        return $next($request);
    }

    public function convertKeysToSnakeCase($data)
    {
        $result = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $result[Str::snake($key)] = $this->convertKeysToSnakeCase($value);
            } else {
                $result[Str::snake($key)] = $value;
            }
        }

        return $result;
    }
}
