<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Proj;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
       return redirect()->route('proj.index');
    }
}
