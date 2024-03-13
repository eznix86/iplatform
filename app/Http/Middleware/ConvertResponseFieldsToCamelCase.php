<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Str;
use Symfony\Component\HttpFoundation\Response;

class ConvertResponseFieldsToCamelCase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $content = $response->getContent();

        try {
            $json = json_decode($content, true);
            $replaced = $this->convertKeysToCamelCase($json);
            $replaced = json_encode($replaced);
            $response->setContent($replaced);
        } catch (\Exception $e) {
            // you can log an error here if you want
        }

        return $response;
    }

    private function convertKeysToCamelCase($data)
    {
        if (is_array($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                $camelCaseKey = Str::camel($key);
                if (is_array($value)) {
                    $result[$camelCaseKey] = $this->convertKeysToCamelCase($value);
                } else {
                    $result[$camelCaseKey] = $value;
                }
            }

            return $result;
        } else {
            return $data;
        }
    }
}
