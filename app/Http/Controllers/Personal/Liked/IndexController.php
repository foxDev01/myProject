<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {
        $projs = auth()->user()->likedProjects;
       
        return view('personal.liked.index', compact('projs'));
    }
}
