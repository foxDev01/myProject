<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest as CommentUpdateRequest;
use App\Models\Comment;

class UpdateController extends Controller
{
    public function __invoke(CommentUpdateRequest $request, Comment $comment )
    {   $data = $request->validate();
        $comment->updata($data);
        return redirect()->route('personal.comment.index');
    }
}
