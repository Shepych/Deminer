<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{

    public function indexAction(Request $request) {
        return view('home.index', [
            'title' => 'Новости криптовалютной индустрии',
            'posts' => Post::whereNotNull('id')->paginate(4),
            'rates' => Cryptocurrency::rates(),
        ]);
    }

    public function courseAction() {
        return view('course.course', [
            'title' => '🔥 Полный курс по криптовалютам, майнингу и цифровой безопасности',
            'rates' => Cryptocurrency::rates(),
        ]);
    }
}
