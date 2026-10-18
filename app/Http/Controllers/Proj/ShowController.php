<?php

namespace App\Http\Controllers\Proj;

use App\Http\Controllers\Controller;
use App\Models\Proj;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke( Proj $proj )
    {
        
        $date = Carbon::parse($proj->created_at);
        $relatedProjs = Proj::where('category_id', $proj->category_id)
            ->where('id', '!=', $proj->id)
            ->take(3)
            ->get();
        return view('proj.show', compact('proj','date', 'relatedProjs'));
    }
}
