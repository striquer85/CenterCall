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
            'Client/gestion_admin',
            ['listeClients' => $client]
        );
    }
}
