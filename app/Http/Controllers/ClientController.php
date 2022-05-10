<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Models\{Address, Client, ClientInformation};
use App\Services\ClientService;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function create()
    {
        return view('client.store');
    }

    public function store(ClientStoreRequest $request)
    {
        $clientData = $request->all();
        $clientData['cpf/cnpj'] =  $clientData['doc'];

        DB::transaction(function () use ($clientData, $request) {
            $client = Client::create($clientData);

            $address = ClientService::getDataByRequestPrefix($request->all(), 'address');
            $addressWithoutPrefix = ClientService::removeRequestPrefix($address, 'address_');
            $addressWithoutPrefix->put('client_id', $client->id);
            Address::create($addressWithoutPrefix->toArray());

            $clientInfo = ClientService::getDataByRequestPrefix($request->all(), 'info');
            $clientInfoWithoutPrefix = ClientService::removeRequestPrefix($clientInfo, 'info_');
            $clientInfoWithoutPrefix->put('client_id', $client->id);
            ClientInformation::create($clientInfoWithoutPrefix->toArray());
        });

        return redirect(route('home'));
    }
}
