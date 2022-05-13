<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\{Address, Client, ClientInformation};
use App\Services\ClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::select(['id', 'name', 'contact', 'cpf/cnpj']);
        if ($request->has('client')) $clients->byName($request->input('client'));
        else $clients->filterByDates($request);
        $clients = $clients->interested($request)->paginate();

        return view('home', compact('clients'));
    }

    public function create()
    {
        return view('client.store');
    }

    public function store(ClientStoreRequest $request)
    {
        $clientData = $request->all();
        $clientData['cpf/cnpj'] = $clientData['doc'];

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

        return redirect(route('client.index'));
    }

    public function edit($id)
    {
        $client = Client::where('id', $id)
            ->with(['address', 'information'])
            ->first();

        return view('client.edit', compact('client'));
    }

    public function update(ClientUpdateRequest $request, $id)
    {
        $clientDataUpdate = $request->all();
        $clientDataUpdate['cpf/cnpj'] = $clientDataUpdate['doc'];

        DB::transaction(function () use ($clientDataUpdate, $request, $id) {
            $client = Client::find($id);
            $client->update($clientDataUpdate);

            $address = ClientService::getDataByRequestPrefix($request->all(), 'address');
            $addressWithoutPrefix = ClientService::removeRequestPrefix($address, 'address_');
            Address::where('client_id', $id)->update($addressWithoutPrefix->toArray());

            $clientInfo = ClientService::getDataByRequestPrefix($request->all(), 'info');
            $clientInfoWithoutPrefix = ClientService::removeRequestPrefix($clientInfo, 'info_');
            ClientInformation::where('client_id', $id)->update($clientInfoWithoutPrefix->toArray());
        });

        return redirect(route('client.index'));
    }
}
