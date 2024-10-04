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
        $questions = $this->questionModel->findAll();
        return view(
            'Question/gestion',
            ['listeQuestion' => $questions]
        );
    }
}
