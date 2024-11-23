<?php

namespace App\Controllers;

class Question extends BaseController
{
    private $questionModel;
    private $campagneModel;
    private $clientModel;

    public function __construct()
    {
        $this->questionModel = model('Question');
        $this->campagneModel = model('Campagne');
        $this->clientModel = model('Client');

    }

    public function gestionQuestion($idCampagne)
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {

            $idUser = auth()->id();
            $idClient = $this->campagneModel->findIdCampagneClient($idCampagne);

            $clientByUser = $this->clientModel->findClient($idUser);


            if ($idClient == null || $clientByUser['ID_CLIENT'] != $idClient['ID_CLIENT']) {
                return redirect()->to("gestion-campagnes/{$clientByUser['ID_CLIENT']}");
            }
        }
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
    public function ajout($idCampagne)
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {

            $idUser = auth()->id();
            $idClient = $this->campagneModel->findIdCampagneClient($idCampagne);

            $clientByUser = $this->clientModel->findClient($idUser);


            if ($idClient == null || $clientByUser['ID_CLIENT'] != $idClient['ID_CLIENT']) {
                return redirect()->to("gestion-campagnes/{$clientByUser['ID_CLIENT']}");
            }
        }
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
        return redirect()->to("creation-question/$idCampagne");
    }
    public function modif($idQuestion)
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {

            $idUser = auth()->id();
            $idCampagne = $this->questionModel->findIdQuestion($idQuestion);

            $idClient = $this->campagneModel->findIdCampagneClient($idCampagne);

            $clientByUser = $this->clientModel->findClient($idUser);

            if ($idClient == null || $clientByUser['ID_CLIENT'] != $idClient[0]['ID_CLIENT']) {
                return redirect()->to("gestion-campagnes/{$clientByUser['ID_CLIENT']}");
            }
        }
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
