<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;


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

    public function ajout(): string
    {
        return view('Client/creation');
    }

    public function create(): RedirectResponse
    {
        $data = $this->request->getPost();
        $this->clientModel->insert($data);
        return redirect('gestion_admin');
    }

    public function delete($ID_CLIENT): RedirectResponse
    {
        $this->clientModel->delete($ID_CLIENT);
        return redirect('gestion_admin');
    }

    public function modif($ID_CLIENT): string
    {
        $client_modif = $this->clientModel->find($ID_CLIENT);
        return view('Client\modif', ['client' => $client_modif]);
    }

    public function update() : RedirectResponse {
        $dataClient = $this->request->getPost();
        $this->clientModel->save($dataClient);
        return redirect('gestion_admin');
        
    }
}
