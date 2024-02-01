<?php

namespace App\Http\Controllers\Category\Proj;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Proj;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $projs = $category->projs()->paginate(6);
        return view('category.proj.index', compact('projs'));
    }
}
