<?php

namespace App\Console;

use App\Models\User;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
//use http\Client;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use simplehtmldom\HtmlWeb;
use Throwable;
use YooKassa\Client;

require __DIR__ . '/yookassa/lib/autoload.php';

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        # Command: php artisan schedule:list ( узнать время до исполнения )
        $schedule->call($this->updateCurrency())->everyTenMinutes();
//        $schedule->call($this->updateCurrency())->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */

    protected function updateCurrency() {
        # Парсинг Toncoin
        $client = new HtmlWeb();
        $html = $client->load('https://ton.org/toncoin');
        $price = $html->find('div', 74)->plaintext . PHP_EOL;
        $toncoin = mb_substr($price, 1, strlen($price));

        #API Bitcoin и Ethereum
        $client = new CoinGeckoClient();
        $bitcoin = $client->coins()->getCoin('bitcoin')['market_data']['current_price']['usd'];
        $ethereum = $client->coins()->getCoin('ethereum')['market_data']['current_price']['usd'];

        $cryptocurrency = [
            'BTC' => $bitcoin,
            'ETH' => $ethereum,
            'TON' => $toncoin,
        ];

        foreach($cryptocurrency as $token => $price) {
            DB::table('crypto_rates')->where('reduction', $token)->update(['rate' => $price]);
        }
    }

    protected function clearUserTable() {
        # Получить данные из магазина
        $client = new Client();
        $client->setAuth(config('app.kassa.id'), config('app.kassa.key'));
        # Получить таблицу юзеров где status 0
        $users = User::where('payment_status', false)->get();

        # Сравнить id у юзера с id у операций в магазине
        foreach ($users as $user) {
            try {
                $payment = $client->getPaymentInfo($user->payment_id);
            } catch (Throwable $e) {
                # Операция отсутствует - удалить юзера и удалить роль
                DB::transaction(function($user) {
                    DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                    DB::table('users')->delete($user->id);
                }, 3);
            }
        }
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
