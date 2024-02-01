<?php

namespace App\Http\Controllers\Proj;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Proj;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        
        $projs = Proj::paginate(6);
        $categories = Category::paginate(6);
        $randomProjs = Proj::get()->random(4);
        $likedProjs = Proj::withCount('likedIuser')->orderBy('liked_i_user_count', 'DESC')->get()->take(4);
        return view('proj.index', compact('projs', 'randomProjs','likedProjs', 'categories'));
    }
}
