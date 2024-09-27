<?php

namespace App\Controllers;

class Campagne extends BaseController
{
    public function index(): string
    {
        return view('accueil');
    }
}
