<?php

namespace App\Http\Controllers\Admin\Proj;

use App\Http\Controllers\Controller;
use App\Models\Proj;

class ShowController extends Controller
{
    public function __invoke(Proj $proj)
    {
       
        return view('admin.proj.show', compact('proj'));
    }
}
