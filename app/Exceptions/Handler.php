<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        // Ambil guard yang gagal login
        $guard = $exception->guards()[0] ?? 'pelanggan';

        // Tentukan route login sesuai guard
        switch ($guard) {
            case 'pemilik':
                $login = route('pemilik'); // route login pemilik
                break;
            case 'pelanggan':
            default:
                $login = route('login'); // route login pelanggan
                break;
        }

        return redirect()->guest($login);
    }
}
