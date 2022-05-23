<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Throwable;
use YooKassa\Client;

class Controller extends BaseController
{
    public $admin_ip = '127.0.0.1';

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkPayment() {
        $user = Auth::user();

        # Если юзер авторизован
        if($user){
            $client = new Client();
            $client->setAuth('911528', 'test_aNNL-y7dECL7iiwOAOhakFVvICBIpKtEFhj2Q4S2oic');


            try {
                $payment = $client->getPaymentInfo($user->payment_id);
            } catch (Throwable $e) {

            }

            # Если операция оплачена - то выдаем доступ к курсу
            # и отправляем регистрационные данные на почту
            if(isset($payment)) {
                if($payment->id == $user->payment_id && $payment->status == 'succeeded' && $user->payment_status == false) {
                    $password = generatePassword();

                    DB::table('users')
                        ->where('id', $user->id)
                        ->update([
                            'password' => Hash::make($password),
                            'payment_status' => true,
                        ]);

                    Auth::user()->payment_status = true;

                    $data = [
                        'paymentId' => Auth::user()->payment_id,
                        'login' =>  Auth::user()->name,
                        'password' => $password,
                    ];

                    # Отправка почты
                    MailController::sendMail($user->email, $data);
                    return true;
                }
            }
        }

        return false;
    }
}
