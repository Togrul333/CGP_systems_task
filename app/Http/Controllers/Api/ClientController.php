<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientFilterRequest;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index(ClientFilterRequest $request)
    {
        $clients = $this->clientRepository->selectAll($request);

        return response()->json([
            'title' => 'Клиенты',
            'data' => $clients,
        ]);
    }

    public function clientCompanies($id)
    {
        $client = $this->clientRepository->selectById($id);

        return response()->json([
            'title' => ' список компаний связанных с клиентом - '.$client->name,
            'data' => $client->companies,
        ]);
    }
}
