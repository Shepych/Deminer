<?php

namespace App\Console;

use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use simplehtmldom\HtmlWeb;

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
        $schedule->call(function () {

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
                'BTC' => 32000,
                'ETH' => 2300,
                'TON' => $toncoin,
            ];

            foreach($cryptocurrency as $token => $price) {
                DB::table('crypto_rates')->where('cryptocurrency', $token)->update(['rate' => $price]);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
