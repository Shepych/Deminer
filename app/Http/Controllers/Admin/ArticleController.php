<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public $maxFiles = 2;

    public function articlesAction() {
        return view('admin.articles-list');
    }

    public function articlesAddAction() {
        return view('admin.articles-add');
    }

    public function create(Request $request){
//        Валидация (проверка на заполнение всех полей)
        if(!$request->title || !$request->text || !$request->cover) {
            return redirect()->back()->withError("Заполните все поля");
        }

        $dir = 'public/articles/';

        $files = Storage::directories($dir);

        foreach ($files as $file) {
            $dirNumber = str_replace($dir,'', $file);
            $directories[] = $dirNumber;
        }
        sort($directories);
        $lastDir = $dir . end($directories);
        $countFiles = count(Storage::files($lastDir));
        if($countFiles >= $this->maxFiles) {
            // Обрезаем строку, получаем номер папки, добавляем +1 и создаём новую папку
            $newDir = $dir . (str_replace($dir,'', $lastDir) + 1);
            $path = str_replace('public/','', $request->file('cover')->store($newDir));
        } else {
            $path = str_replace('public/','', $request->file('cover')->store($lastDir));
        }

        # Добавить запись в базу
        DB::table('posts')->insert([
            'title' => $request->title,
            'content' => nl2br($request->text),
            'url' => Str::slug($request->title),
            'img' => 'storage/' . $path,
            'description' => 'Описание отсутствует',
            'publication' => date('Y-m-d H-i-s'),
        ]);

        return redirect()->back()->withSuccess("Статья успешно добавлена");
    }
}
