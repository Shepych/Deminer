<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{
    public function indexAction() {
        return view('home.index', [
            'title' => 'Новости криптовалютной индустрии',
            'posts' => Post::whereNotNull('id')->paginate(4),
        ]);
    }

    public function courseAction() {
        return view('course.course', [
            'title' => '🔥 Полный курс по криптовалютам, майнингу и цифровой безопасности',
        ]);
    }
}
