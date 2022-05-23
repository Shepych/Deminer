<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendMail($mail, $data) {
        $data = [
            'title' => 'Квитанция об оплате',
            'paymentId' => $data['paymentId'],
            'login' => $data['login'],
            'password' => $data['password'],
        ];

        Mail::to($mail)->send(new SignUp($data));
    }
}
