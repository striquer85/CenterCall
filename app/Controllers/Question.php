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

    public function gestionQuestion($idCampagne): string
    {
        $listeQuestion = $this->questionModel->findIdCampagne($idCampagne);
        $idCampagne = $this->campagneModel->find($idCampagne);
        return view(
            'Question/gestion',
            ['campagne' => $idCampagne,
            'listeQuestion' => $listeQuestion]
        );
    }
}
