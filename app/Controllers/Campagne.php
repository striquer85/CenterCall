<?php

namespace App\Controllers;

class Campagne extends BaseController
{

    private  $campagnetModel;
    public function __construct()
    {
        $this->campagnetModel = model('Campagne');
    }
    public function index(): string
    {
        return view('accueil');
    }
    public function dashboard(): string
    {
        

        // récupére tous les campagnes de la table avec "findAll()" 

        $campagne = $this->campagnetModel->findAll();

        return view('Campagne/gestion', [
            'listeCampagnes' => $campagne
        ]);
    }

    public function ajout(): string
    {    
        return view('Campagne/creation');
    }
    
}
