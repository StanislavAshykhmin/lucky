<?php

namespace App\Services\Helpers;

class AjaxResponseNotification
{
    public static function success(string $message, $payload = null, string $route = null): \Illuminate\Http\Response
    {
        $response = [
            'toast' => [
                'type' => 'success',
                'text' => $message,
            ],
        ];
        if ($payload){
            $response['payload'] = $payload;
        }
        if ($route){
            $response['route'] = $route;
        }
        return response($response, 200);
    }

    public static function warning(string $message, $payload = null, string $route = null): \Illuminate\Http\Response
    {
        $response = [
            'toast' => [
                'type' => 'warning',
                'text' => $message,
            ],
        ];
        if ($payload){
            $response['payload'] = $payload;
        }
        if ($route){
            $response['route'] = $route;
        }
        return response($response, 200);
    }

    public static function info(string $message, $payload = null, string $route = null): \Illuminate\Http\Response
    {
        $response = [
            'toast' => [
                'type' => 'info',
                'text' => $message,
            ],
        ];
        if ($payload){
            $response['payload'] = $payload;
        }
        if ($route){
            $response['route'] = $route;
        }
        return response($response, 200);
    }

    public static function error(string $message, $payload = null, string $route = null): \Illuminate\Http\Response
    {
        $response = [
            'toast' => [
                'type' => 'error',
                'text' => $message,
            ],
        ];
        if ($payload){
            $response['payload'] = $payload;
        }
        if ($route){
            $response['route'] = $route;
        }
        return response($response, 422);
    }
}
