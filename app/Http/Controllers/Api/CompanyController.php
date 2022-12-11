<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyFilterRequest;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    private  $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index(CompanyFilterRequest $request)
    {
        $companies      = $this->companyRepository->selectAll($request);

        return response()->json([
            'title'         =>  'Компании',
            'data'          =>  $companies,
        ]);
    }
}
