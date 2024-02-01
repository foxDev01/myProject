<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;

class DeleteController extends Controller
{
    public function __invoke(Comment $comment )
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
