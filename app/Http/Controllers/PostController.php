<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postAction($url) {
        $article = Post::where('url', $url)->first();
        if(!$article){
            abort(404);
        }

        return view('news.post' , [
            'article' => $article,
            'title' =>  $url,
            'rates' => Cryptocurrency::rates(),
        ]);
    }
}
