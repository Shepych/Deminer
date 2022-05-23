<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use App\Models\Post;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use simplehtmldom\HtmlWeb;
use App\Models\Main;

class PostController extends Controller
{
    public function postAction(Request $request, $url) {
        # Проверка ограничения счетчика
        if(!Cookie::get($url)) {
            Post::where('url', $url)->increment('views');
        }

        $article = Post::where('url', $url)->first();
        if(!$article){
            abort(404);
        }

        $previous = DB::select('select * from posts where id < ? order by id desc limit 1', [$article->id]);
        $next = DB::select('select * from posts where id > ? limit 1', [$article->id]);

        $previous = $previous ? $previous[0] : null;
        $next = $next ? $next[0] : null;

        $response = new Response(view('news.post' , [
            'article' => $article,
            'title' =>  $url,
            'rates' => Cryptocurrency::rates(),
            'previousPost' => $previous,
            'nextPost' => $next,
        ]));

        return $response->withCookie($url, true, 10);
    }
}
