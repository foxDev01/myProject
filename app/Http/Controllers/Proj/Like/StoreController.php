<?php

namespace App\Http\Controllers\Proj\Like;

use App\Http\Controllers\Controller;
use App\Models\Proj;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(Proj $proj)
    {
        auth()->user()->likedProjects()->toggle($proj->id);
        return redirect()->back();
    }
}
