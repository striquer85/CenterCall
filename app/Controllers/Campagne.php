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
    public function dashboard($ID_CLIENT): string
    {
        

        // récupére tous les campagnes de la table avec "findAll()" 

        $campagne = $this->campagnetModel->find($ID_CLIENT);

        return view('Campagne/gestion', [
            'listeCampagnes' => $campagne
        ]);
    }

    public function ajout(): string
    {    
        return view('Campagne/creation');
    }
    
}
