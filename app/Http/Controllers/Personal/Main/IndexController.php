<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\ProjectUserLike;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = Comment::get()
        ->where('user_id', auth()->user()->id);

        $likes = ProjectUserLike::get()
        ->where('user_id', auth()->user()->id);

        return view('personal.main.index',compact('comments', 'likes'));
    }
}
