<?php namespace App\Providers;

use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot ()
    {
        view()->composer('*', function ($view) {

            $messages = Cache::remember('additionalClassRequest', 60, function () {
                return MessageRepository::additionalClassRequest();
            });

            $todayBirthdays = Cache::remember('todayBirthdays', 60, function () { // todo:: make it unit end of day
                return UserRepository::todayBirthdays();
            });

            $messagesCount = Cache::remember('messageCount', 1, function () {
                return MessageRepository::messageCount();
            });

            $eventCount = count($messages) + count($todayBirthdays);

            $view->with('messages', $messages);
            $view->with('eventCount', $eventCount);
            $view->with('todayBirthdays', $todayBirthdays);
            $view->with('messagesCount', $messagesCount);
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register ()
    {
        //
    }
}
