<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Cryptocurrency;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use YooKassa\Client;

require __DIR__ . '/yookassa/lib/autoload.php';

class MainController extends Controller
{

    public function indexAction(Request $request) {
        $posts = Post::orderBy('publication', 'DESC')->paginate(4);
        if($request->page > $posts->lastPage()) {
            abort(404);
        }

        $this->checkPayment();

        return view('home.index', [
            'title' => 'Новости криптовалютной индустрии',
            'posts' => $posts,
            'rates' => Cryptocurrency::rates(),
        ]);
    }

    public function courseAction(Request $request) {
        $check = $this->checkPayment();

        if($request->ajax()) {
            $client = new Client();
            $client->setAuth("911528", "test_aNNL-y7dECL7iiwOAOhakFVvICBIpKtEFhj2Q4S2oic");
            $payment = $client->createPayment(
                array(
                    'amount' => array(
                        'value' => 300.0,
                        'currency' => 'RUB',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => 'http://127.0.0.1:8000/course',
                    ),
                    'capture' => true,
                    'merchant_customer_id' => $request->email,
                    'metadata' => [
                        'ip' => $request->getClientIp(),
                    ],
                ),
                uniqid('', true)
            );

            # Если пользователь не авторизован то создаём пользователя
            if(!Auth::user()) {
                $randomize = rand(0, 50000);

                $user = User::create([
                    'name' => 'user_' . $randomize,
                    'email' => $request->email,
                    'password' => Hash::make(generatePassword()),
                    'payment_id' => $payment->id,
                ]);

                # Присваиваем права обычного пользователя
                $user->assignRole('user');

                # Авторизировать пользователя
                Auth::loginUsingId($user->id, $remember = true);
            } else {
                # Если не оплачен платеж то обновляем данные
                if(!$check) {
                    # Обновить почту вводимую у юзера
                    # Записать id платежа
                    DB::table('users')
                        ->where('id', Auth::id())
                        ->update([
                            'payment_id' => $payment->id,
                            'email' => $request->email,
                        ]);
                } else {
                    # если оплачен - то редирект на эту же страницу
                    return route('course');
                }
            }

            return $payment['_confirmation']['_confirmationUrl'];
        }

        return view('course.course', [
            'title' => '🔥 Полный курс по криптовалютам, майнингу и цифровой безопасности',
            'rates' => Cryptocurrency::rates(),
        ]);
    }
}
