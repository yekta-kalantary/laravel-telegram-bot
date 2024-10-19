<?php

namespace Yekta\LaravelTelegramBot\Facades;

use Illuminate\Support\Facades\Facade;

class Telegram extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Longman\TelegramBot\Telegram::class;
    }

    public static function withCredentials($bot_api_key = null, $bot_username = null)
    {
        return app()->makeWith(\Longman\TelegramBot\Telegram::class, [
            'bot_api_key' => $bot_api_key ?? config('telegram.bot_api_key'),
            'bot_username' => $bot_username ?? config('telegram.bot_username'),
        ]);
    }
}
