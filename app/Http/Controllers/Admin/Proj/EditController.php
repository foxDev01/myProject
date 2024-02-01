<?php

namespace App\Http\Controllers\Admin\Proj;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Proj;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Proj $proj)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.proj.edit', compact('proj', 'categories', 'tags'));
    }
}
