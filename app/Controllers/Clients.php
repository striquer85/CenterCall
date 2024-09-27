<?php

namespace App\Controllers;

use App\Models\Client;

class Clients extends BaseController
{

    private  $clientModel;
    public function __construct()
    {
        $this->clientModel = new Client;
    }

    public function gestion_clients(): string
    {
        $client = $this->clientModel->findAll();
        return view(
            'gestion_admin',
            ['listeClients' => $client]
        );
    }
}
