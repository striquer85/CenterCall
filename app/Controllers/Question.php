<?php

namespace App\Controllers;

class Question extends BaseController
{
    public function index(): string
    {
        return view('accueil');
    }
}
