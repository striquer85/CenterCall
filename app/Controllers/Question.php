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
        $questions = $this->questionModel->findIdCampagne($idCampagne);
        $idCampagne = $this->campagneModel->find($idCampagne);

        return view(
            'Question/gestion',
            [
                'campagne' => $idCampagne,
                'questions' => $questions
            ]
        );
    }
    public function ajout($idCampagne): string
    {
        $idCampagne = $this->campagneModel->find($idCampagne);
        return view(
            'Question/creation',
            [
                'idCampagne' => $idCampagne
            ]
        );
    }
    public function create()
    {
        $question = $this->request->getPost();
        $idCampagne = $this->request->getPost('ID_CAMPAGNE');
        $this->questionModel->insert($question);
        return redirect()->to("gestion-question/$idCampagne");
    }
    public function modif($idQuestion): string
    {
        $idQuestion = $this->questionModel->find($idQuestion);
        return view(
            'Question/modif',
            [
                'question' => $idQuestion
            ]
        );
    }
    public function update()
    {
        $question = $this->request->getPost();
        $idCampagne = $this->request->getPost('ID_CAMPAGNE');
        $this->questionModel->save($question);
        return redirect()->to("gestion-question/$idCampagne");
    }


    public function delete()
    {
        $idQuestion = $this->request->getPost('ID_QUESTION');
        $idCampagne = $this->request->getPost('ID_CAMPAGNE');

        $this->questionModel->delete($idQuestion);
        return redirect()->to("gestion-question/$idCampagne");
    }
}
