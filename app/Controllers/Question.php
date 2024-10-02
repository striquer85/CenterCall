<?php

namespace App\Controllers;

class Question extends BaseController
{
    private $questionModel;

    public function __construct()
    {
        $this->questionModel = model('Question');
    }

    public function gestionquestion($idCampagne): string
    {
        return view('_question_gestion');
    }

}
