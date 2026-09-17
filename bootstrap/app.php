<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (PostTooLargeException $e, Request $request) {
            return back()
                ->with('error', 'Ukuran total foto/berkas yang Anda unggah terlalu besar melebihi kapasitas server PHP. Silakan pilih foto dengan ukuran yang lebih kecil!')
                ->withInput($request->except(['image', 'gallery', 'file', 'profile_image_file', 'poster_image']));
        });
    })->create();
