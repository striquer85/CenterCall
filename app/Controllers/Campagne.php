<?php

namespace App\Controllers;

class Campagne extends BaseController
{
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
}
