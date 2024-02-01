<?php

namespace App\Http\Controllers\Admin\Proj;

use App\Http\Requests\Admin\Proj\StoreRequest;



class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request )
    {


        $data = $request->validated();
        $this->service->store($data);
       
        return redirect()->route('admin.proj.index');
    }
}