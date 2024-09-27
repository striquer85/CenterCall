<?php

namespace App\Controllers;

class Question extends BaseController
{
    public function gestionquestion($idCampagne): string
    {
        return view('_question_gestion');
    }
}
