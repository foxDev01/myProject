<?php

namespace App\Http\Controllers\Admin\Proj;

use App\Http\Controllers\Admin\Proj\BaseController as ProjBaseController;

use App\Http\Requests\Admin\Proj\UpdateRequest;
use App\Models\Proj;
use Illuminate\Support\Facades\Storage;

class UpdateController extends ProjBaseController
{
    public function __invoke(UpdateRequest $request, Proj $proj)
    {

        $data = $request->validated();
        $proj = $this->service->update($data, $proj);
        
        
        return view('admin.proj.show', compact('proj'));
    }
}
 