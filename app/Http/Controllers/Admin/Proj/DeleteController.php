<?php

namespace App\Http\Controllers\Admin\Proj;

use App\Http\Controllers\Controller;
use App\Models\Proj;

class DeleteController extends Controller
{
    public function __invoke(Proj $proj)
    {
        $proj->delete();
        return redirect()->route('admin.proj.index');
    }
}
