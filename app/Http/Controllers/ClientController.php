<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function store() {
        $attr = request()->validate([
            'name' => ['required', Rule::unique('clients', 'name')]
        ]);

        $client = Client::create($attr);
        return $client;
    }

    public function update(Client $client) {
        $attr = request()->validate([
            'name' => ['required', Rule::unique('clients', 'name')]
        ]);
        $client->update($attr);
        return $client;
    }

    public function destroy(Client $client) {
        $client->delete();
    }

    public function index() {
        return Client::all();
    }
}
