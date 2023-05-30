<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    protected $repository;

    public function __construct(SupportRepository $moduleRepository)
    {
        $this->repository = $moduleRepository;
    }

    public function index(Request $request)
    {
        $modules = $this->repository->getSupports($request->all());

        return SupportResource::collection($modules);
    }
}
