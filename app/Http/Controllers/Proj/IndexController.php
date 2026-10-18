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
        $pageIds = $projs->pluck('id');
        $randomProjs = Proj::whereNotIn('id', $pageIds)->inRandomOrder()->limit(4)->get();
        $excluded = $pageIds->merge($randomProjs->pluck('id'));
        $likedProjs = Proj::withCount('likedIuser')
            ->whereNotIn('id', $excluded)
            ->orderBy('liked_i_user_count', 'DESC')
            ->take(4)
            ->get();
        return view('proj.index', compact('projs', 'randomProjs','likedProjs', 'categories'));
    }
}
