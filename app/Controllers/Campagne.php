<?php

namespace App\Controllers;

class Campagne extends BaseController
{
    public function index(): string
    {
        return view('accueil');
    }
    public function gestion_campagnes(): string
    {
        return view('gestion_campagnes');
    }
}
