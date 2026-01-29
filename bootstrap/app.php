<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        /*
         * Централизованная обработка исключений или ошибок как кому.
         * что это нам дает:
         *
         * единый JSON-ответ для всех API
         * фронт всегда получает message а у нас там result.message мы только выводим сообщения
         *, но можно и добавлять другие поля, но в задании только текст ошибок или ок.. :)
         * FormRequest автоматически ловится, то есть в сервисе есть вот такое: throw new DomainException('Вы уже отправили заявку в последние 24 часа'); ловим без проблем и не нужно
         * Возвращать напрямую как в контролере return response()->json([… Удобнее
         **/
        $exceptions->render(function (Throwable $e, $request) {

            if (! $request->expectsJson()) {
                return null;
            }

            // Бизнес-ошибки (лимиты, правила)
            if ($e instanceof DomainException) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                    'data'    => null,
                    'errors'  => null,
                ], 422);
            }

            // Ошибки валидации (FormRequest)
            if ($e instanceof ValidationException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ошибка валидации',
                    'data'    => null,
                    'errors'  => $e->errors(),
                ], 422);
            }

            return response()->json([
                'success' => false,
                // пока для ТЗ достаточно!
                'message' => 'Внутренняя ошибка сервера возможные причины: "номер телефона или email уже используеться" | 422 Слишком быстро отправляеться форма ',
                'data'    => null,
                'errors'  => null,
            ], 500);
        });

        //...
    })->create();
