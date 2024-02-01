<?php

namespace App\Http\Controllers\Admin\Proj;

use App\Http\Controllers\Controller;
use App\Models\Proj;

class IndexController extends Controller
{
    public function __invoke()
    {
        $projs = Proj::all();
        return view('admin.proj.index', compact('projs'));
    }
}
