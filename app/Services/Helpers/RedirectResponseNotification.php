<?php

namespace App\Services\Helpers;

class RedirectResponseNotification
{
    public static function successRoute($message, $route): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route($route)->with([
            'toast' => [
                'type' => 'success',
                'text' => $message,
            ],
        ]);
    }
    public static function infoRoute($message, $route): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route($route)->with([
            'toast' => [
                'type' => 'info',
                'text' => $message,
            ],
        ]);
    }
    public static function warningRoute($message, $route): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route($route)->with([
            'toast' => [
                'type' => 'warning',
                'text' => $message,
            ],
        ]);
    }
    public static function errorRoute($message, $route): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route($route)->with([
            'toast' => [
                'type' => 'error',
                'text' => $message,
            ],
        ]);
    }
    public static function successBack($message): \Illuminate\Http\RedirectResponse
    {
        return redirect()->back()->with([
            'toast' => [
                'type' => 'success',
                'text' => $message,
            ],
        ]);
    }
    public static function infoBack($message): \Illuminate\Http\RedirectResponse
    {
        return redirect()->back()->with([
            'toast' => [
                'type' => 'info',
                'text' => $message,
            ],
        ]);
    }
    public static function warningBack($message): \Illuminate\Http\RedirectResponse
    {
        return redirect()->back()->with([
            'toast' => [
                'type' => 'warning',
                'text' => $message,
            ],
        ]);
    }
    public static function errorBack($message): \Illuminate\Http\RedirectResponse
    {
        return redirect()->back()->with([
            'toast' => [
                'type' => 'error',
                'text' => $message,
            ],
        ]);
    }
}
