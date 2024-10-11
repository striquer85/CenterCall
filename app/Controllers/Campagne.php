<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Campagne extends BaseController
{

    private  $campagnetModel;
    private  $clientModel;

    public function __construct()
    {
        $this->campagnetModel = model('Campagne');
        $this->clientModel = model('Client');
    }
    public function index(): string
    {
        return view('accueil');
    }
    public function dashboard($ID_CLIENT): string
    {

        // récupére tous les campagnes de la table avec "findAll()" 

        $campagne = $this->campagnetModel->findIdClient($ID_CLIENT);
        $idClient = $this->clientModel->find($ID_CLIENT);

        return view('Campagne/gestion', [
            'listeCampagnes' => $campagne,
            'client' => $idClient
        ]);
    }

    public function ajout($ID_CLIENT): string
    {
        return view('Campagne/creation');
    }

    public function create(): RedirectResponse
    {

        $data = $this->request->getPost();
        // var_dump($data);
        // die();
        $this->campagnetModel->insert($data);

        return redirect('gestion_campagnes');
    }
}
