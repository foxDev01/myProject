<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Proj;

class DeleteController extends Controller
{
    public function __invoke(Proj $proj)
    {
        auth()->user()->likedProjects()->detach($proj->id);
       
        return redirect()->route('personal.liked.index');
    }
}
