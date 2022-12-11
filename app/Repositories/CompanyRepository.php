<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class CompanyRepository
{

    public function selectAll($request)
    {
        $companies = Company::with('clients');

        if ($request->filled('name')) {
            $companies->where('name', 'like', "%{$request->get('name')}%");
        }
        if ($request->filled('address')) {
            $companies->where('address', 'like', "%{$request->get('address')}%");
        }
//        if ($request->filled('gender')) {
//            $companies->where('gender', $request->get('gender'));
//        }

        if ($request->filled('sortBy') && in_array($request->get('sortBy'), ['id', 'created_at'])) {
            $sortBy = $request->get('sortBy');
        } else {
            $sortBy = 'id';
        }
        if ($request->filled('sortOrder') && in_array($request->get('sortOrder'), ['asc', 'desc'])) {
            $sortOrder = $request->get('sortOrder');
        } else {
            $sortOrder = 'desc';
        }

        if ($request->filled('client_name')) {
            $companies->whereHas("clients", function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->get('client_name')}%");
            });
        }

        if ($request->filled('perPage')) {
            $perPage = $request->get('perPage');
        } else {
            $perPage = 5;
        }

        if ($request->filled('paginate')) {
            $companies = $companies->orderBy($sortBy, $sortOrder)->paginate($perPage);
        } else {
            $companies = $companies->orderBy($sortBy, $sortOrder)->get();
        }


        return $companies;
    }

    public function selectById($id)
    {
        $model = Company::find($id);
        if ($model == null)
            throw new ModelNotFoundException($id . '- не найден');

        return $model;
    }

    public function getTotalCount()
    {
        return Company::count();
    }

    public function save($data)
    {
        DB::beginTransaction();
        try {
            if ($data['company_id'] == 0)
                $this->insert($data);
            else
                $this->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        $model = Company::find($id);
        if ($model == null)
            throw new ModelNotFoundException($id . '- не найден');

        $model->delete();
    }

    private function insert($data)
    {
        $company = Company::create([
            'name' => $data['name'],
            'address' => $data['address'],
        ]);

        return $company;
    }

    private function update($data)
    {
        $company = Company::find($data['company_id']);
        if ($company == null)
            throw new ModelNotFoundException($data['company_id'] . '- не найден');

        $company->name = $data['name'];
        $company->address = $data['address'];
        $company->save();

        return $company;
    }
}
