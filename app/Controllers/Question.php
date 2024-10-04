<?php

namespace App\Controllers;

class Question extends BaseController
{
    private $questionModel;
    private $campagneModel;

    public function __construct()
    {
        $this->questionModel = model('Question');
        $this->campagneModel = model('Campagne');
    }

    public function gestionquestion($idCampagne): string
    {
        return view('Question/gestion');
    }

}
