<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFilterRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\SimpleActionRequest;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    private  $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index(ClientFilterRequest $request)
    {
        $clients      = $this->clientRepository->selectAll($request);
        $total_count    = $this->clientRepository->getTotalCount();
        $view_model = [
            'title'         =>  'Клиенты',
            'data'          =>  $clients,
            'total_count'   =>  $total_count
        ];
        return view('client.index', $view_model);
    }

    public function create()
    {
        $view_model = [
            'title'     => 'Новый клиент',
            'client'  => null
        ];

        return view('client.edit', $view_model);
    }

    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        $this->clientRepository->save($data);

        return response()->json([
            'result'    => 'success',
            'message'   => 'Данные сохранены',
        ]);
    }

    public function edit($id)
    {
        $client = $this->clientRepository->selectById($id);
        $view_model = [
            'title'     => 'Редактирование данных',
            'client'  => $client
        ];

        return view('client.edit', $view_model);
    }


    public function destroy(SimpleActionRequest $request)
    {

        $data = $request->validated();
        $this->clientRepository->delete($data['id']);

        return response()->json([
            'result'    => 'success',
            'message'   => 'Данные удалены',
        ]);
//        return redirect()->route('clients.index')->with('warning', 'Данные удалены');
    }
}
