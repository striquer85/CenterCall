<?php

namespace App\Controllers;


class Client extends BaseController
{

    private  $clientModel;
    public function __construct()
    {
        $this->clientModel = model('Client');
    }

    public function gestionclient(): string
    {
        $client = $this->clientModel->findAll();
        return view(
            '_client_gestion_admin',
            ['listeClients' => $client]
        );

    }

    public function ajout(): string
    {
        return view('_client_creation');
    }

    public function create($clientId): string
    {
        $client_modif = $this->clientModel->find($clientId);
    return view('_client_modif', ['client => $client_modif' ]);
    }

}
