<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function indexAction(Request $request) {
        $posts = Post::all();

        return view('admin.panel', [
            'posts' => $posts,
        ]);
    }

}
