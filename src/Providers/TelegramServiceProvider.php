<?php

namespace Yekta\LaravelTelegramBot\Providers;

use Illuminate\Support\ServiceProvider;
use Longman\TelegramBot\Telegram;

class TelegramServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Telegram::class, function ($app, $params = []) {
            $bot_api_key = $params['bot_api_key'] ?? config('telegram.bot_api_key');
            $bot_username = $params['bot_username'] ?? config('telegram.bot_username');

            return new Telegram($bot_api_key, $bot_username);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/telegram.php' => config_path('telegram.php'),
        ], 'config');
    }
}
