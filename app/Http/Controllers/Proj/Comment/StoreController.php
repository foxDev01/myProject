<?php

namespace App\Http\Controllers\Proj\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proj\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Proj;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(Proj $proj, StoreRequest $request )
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['project_id'] = $proj->id; 
        Comment::create($data);
        return redirect()->route('proj.show', $proj->id);
    }
}
