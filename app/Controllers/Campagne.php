<?php

namespace App\Controllers;

class Campagne extends BaseController
{
    public function gestion_campagnes(): string
    {
        return view('gestion_campagnes');
    }
}
