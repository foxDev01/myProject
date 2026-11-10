<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DeleteController extends Controller
{
    public function __invoke(Comment $comment)
    {
        abort_unless($comment->user_id === auth()->id(), 403);

        $comment->delete();

        return redirect()->route('personal.comment.index');
    }
}
