<?php

namespace App\Controllers;

class Campagne extends BaseController
{

    private  $clientModel;
    public function __construct()
    {
        $this->clientModel = model('Client');
    }
    public function index(): string
    {
        return view('accueil');
    }
    public function dashboard(): string
    {
        $campagnetModel = new \App\Models\Campagne();

        // récupére tous les campagnes de la table avec "findAll()" 

        $campagne = $campagnetModel->findAll();

        return view('Campagne/gestion', [
            'listeCampagnes' => $campagne
        ]);
    }

    public function ajout(): string
    {
        $campagnetModel = new \App\Models\Campagne();

        

        return view('Campagne/creation');
    }
    
}
