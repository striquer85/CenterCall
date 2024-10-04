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



}
