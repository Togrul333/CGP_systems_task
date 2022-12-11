<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyFilterRequest;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\SimpleActionRequest;
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
        $total_count    = $this->companyRepository->getTotalCount();
        $view_model = [
            'title'         =>  'Компании',
            'data'          =>  $companies,
            'total_count'   =>  $total_count
        ];
        return view('company.index', $view_model);
    }

    public function create()
    {
        $view_model = [
            'title'     => 'Новая компания',
            'company'  => null
        ];

        return view('company.edit', $view_model);
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->validated();
        $this->companyRepository->save($data);

        return redirect()->route('companies.index')->with('success', 'Данные сохранены');
    }

    public function edit($id)
    {
        $company = $this->companyRepository->selectById($id);
        $view_model = [
            'title'     => 'Редактирование данных',
            'company'  => $company
        ];

        return view('company.edit', $view_model);
    }


    public function destroy(SimpleActionRequest $request)
    {
        $data = $request->validated();
        $this->companyRepository->delete($data['id']);

        return redirect()->route('companies.index')->with('warning', 'Данные удалены');
    }
}
