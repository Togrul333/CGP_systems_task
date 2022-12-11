<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ClientRepository
{

    public function selectAll($request)
    {
        $clients = Client::with('companies');

        if ($request->filled('name')) {
            $clients->where('name', 'like', "%{$request->get('name')}%");
        }
        if ($request->filled('address')) {
            $clients->where('address', 'like', "%{$request->get('address')}%");
        }
        if ($request->filled('number')) {
            $clients->where('number', $request->get('number'));
        }

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

        if ($request->filled('company_name')) {
            $clients->whereHas("companies", function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->get('company_name')}%");
            });
        }

        if ($request->filled('perPage')) {
            $perPage = $request->get('perPage');
        } else {
            $perPage = 5;
        }

        if ($request->filled('paginate')) {
            $clients = $clients->orderBy($sortBy, $sortOrder)->paginate($perPage);
        } else {
            $clients = $clients->orderBy($sortBy, $sortOrder)->get();
        }
        return $clients;
    }
    public function selectById($id)
    {
        $model = Client::with('companies')->find($id);
        if ($model == null)
            throw new ModelNotFoundException($id . '- не найден');

        return $model;
    }

    public function getTotalCount() {
        return Client::count();
    }

    public function save($data)
    {
        DB::beginTransaction();
        try {
            if ($data['client_id'] == 0)
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
        $model = Client::find($id);
        if ($model == null)
            throw new ModelNotFoundException($id . '- не найден');

        $model->delete();
    }

    private function insert($data)
    {
        $client = Client::create([
            'name'           =>  $data['name'],
            'address'        =>  $data['address'],
            'number'         =>  $data['number'],
        ]);

        return $client;
    }

    private function update($data)
    {
        $client = Client::find($data['client_id']);
        if ($client == null)
            throw new ModelNotFoundException($data['client_id'] . '- не найден');

        $client->name = $data['name'];
        $client->address = $data['address'];
        $client->number = $data['number'];
        $client->save();

        return $client;
    }
}
