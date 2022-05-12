<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
//use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{

    public $maxFiles = 2;

    public function articlesAction() {
        return view('admin.articles-list',
        [
            'articles' => Post::all(),
        ]);
    }

    public function articlesAddAction() {
        return view('admin.articles-add');
    }

    public function articlesEditAction(Request $request, $id) {
        $post = DB::table('posts')->where('id', $id)->get();


        if($request->isMethod('post')){
            Validator::make($request->all(), [
                'title' => 'required',
                'text' => 'required',
            ],[
                'title.required' => 'Введите заголовок',
                'text.required' => 'Заполните статью контентом',
            ])->validateWithBag('post');

            # Меняем картинку
            if($request->file('cover')) {
                $file = file_exists(public_path($post[0]->img));
                # Проверка наличия файла для игнорирования ошибки
//                dd($post[0]->img);
                if($file){
                    # Удаляем предыдущю картинку
                    unlink(public_path($post[0]->img));
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
                    $path = 'storage/' . str_replace('public/','', $request->file('cover')->store($newDir));
                } else {
                    $path = 'storage/' . str_replace('public/','', $request->file('cover')->store($lastDir));
                }
            }

            if(!isset($path)) {
                $path = $post[0]->img;
            }

            # Обновляем данные
            DB::table('posts')->where('id', $id)->update([
                'title' => $request->title,
                'content' => $request->text,
                'img' => $path,
            ]);
            return redirect()->back()->withSuccess("Статья успешно обновлена");
        }

        return view('admin.articles-edit', [
            'post' => $post[0],
        ]);
    }

    public function create(Request $request){
//        Валидация (проверка на заполнение всех полей)
        Validator::make($request->all(), [
            'title' => 'required|unique:posts',
            'text' => 'required',
            'cover' => 'required',
        ],[
            'title.required' => 'Введите заголовок',
            'title.unique' => 'Такая статья уже существует',
            'text.required' => 'Заполните статью контентом',
            'cover.required' => 'Загрузите картинку',
        ])->validateWithBag('post');

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
            'content' => $request->text,
            'url' => Str::slug($request->title),
            'img' => 'storage/' . $path,
            'description' => 'Описание отсутствует',
            'publication' => date('Y-m-d H-i-s'),
        ]);

        return redirect()->back()->withSuccess("Статья успешно добавлена");
    }

    public function delete($id) {
        // Удалить по id
        DB::table('posts')->delete($id);
        return redirect()->back()->withSuccess('Статья была удалена');
    }
}
