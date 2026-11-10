<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest as CommentUpdateRequest;
use App\Models\Comment;

class UpdateController extends Controller
{
    public function __invoke(CommentUpdateRequest $request, Comment $comment)
    {
        abort_unless($comment->user_id === auth()->id(), 403);

        $comment->update($request->validated());

        return redirect()->route('personal.comment.index');
    }
}
