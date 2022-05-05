<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postAction($url) {
        $calculator = Post::calculator();
        dd($calculator);
        return 'Страница с новостью, url: ' . $url;
    }
}
