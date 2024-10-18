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
    public function connexion(): string
    {
        return view('connexion');
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
        $idClient = $this->clientModel->find($ID_CLIENT);
        return view('Campagne/creation', ['idClient' => $idClient]);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->campagnetModel->insert($data);
        return redirect()->to("gestion-campagnes/$idClient");
    }

    public function modif($ID_CAMPAGNE): string
    {
        $campagne = $this->campagnetModel->find($ID_CAMPAGNE);

        return view('Campagne/modif', ['campagne' => $campagne]);
    }

    public function update()
    {
        $idClient = $this->request->getPost('ID_CLIENT');
        //$idCampagne = $this->request->getPost('ID_CAMPAGNE');
        $data = $this->request->getPost();

        $this->campagnetModel->save($data);
        //return redirect()->to("gestion-question/$idCampagne");
        return redirect()->to("gestion-campagnes/$idClient");
    }
}
