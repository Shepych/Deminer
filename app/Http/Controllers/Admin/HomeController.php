<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct() {
        # Дополнительная безопасность по IP для админки
        if(getIp() != $this->admin_ip){
            abort(403);
        }
    }

    public function indexAction(Request $request) {
        $posts = Post::all();

        return view('admin.panel', [
            'posts' => $posts,
        ]);
    }

}
