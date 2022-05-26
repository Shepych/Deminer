<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Cryptocurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function lessonAction($id) {
        if(!isset(Auth::user()->payment_status)) {
            return redirect('/login');
        }

        $lesson = Course::where('id', $id)->first();

        $previous = DB::select('select * from lessons where id < ? order by id desc limit 1', [$lesson->id]);
        $next = DB::select('select * from lessons where id > ? limit 1', [$lesson->id]);

        $previous = $previous ? $previous[0] : null;
        $next = $next ? $next[0] : null;

        if(!$lesson) abort(404);
        $array = [
            'title' => $lesson->title,
            'lesson' => $lesson,
            'rates' => Cryptocurrency::rates(),
            'previousPost' => $previous,
            'nextPost' => $next,
        ];
        return view('course.lesson', $array);
    }
}
