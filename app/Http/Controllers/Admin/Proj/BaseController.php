<?php

namespace App\Http\Controllers\Admin\Proj;

use App\Http\Controllers\Controller;
use App\Service\ProjService as ServiceProjService;


class BaseController extends Controller
{
    public $service;
    public function __construct(ServiceProjService $service)
    {
        $this->service = $service;
    }
}
