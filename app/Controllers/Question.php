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
        //Test pour voir si le compte est admin aucun traitement
        $user = auth()->user();
        if (!$user->inGroup('admin')) {

            $idUser = auth()->id();
            $idClient = $this->campagneModel->findClientIdByCampagneId($idCampagne);

            $clientByUser = $this->clientModel->findClientIdByUserId($idUser);

            //Test pour voir si le compte tente d'acceder a d'autre page que les siens
            //Renvoie vers leur gestion campagne
            if ($idClient == null || $clientByUser['ID_CLIENT'] != $idClient[0]['ID_CLIENT']) {
                return redirect()->to("gestion-campagnes/{$clientByUser['ID_CLIENT']}");
            }
        }
        //Trouve les questions par rapport a une Campagne
        $questions = $this->questionModel->findQuestionsByCampagneId($idCampagne);
        //Trouve les information comme titre,date et libelle de la campagne
        $campagne = $this->campagneModel->find($idCampagne);

        return view(
            'Question/gestion',
            [
                'campagne' => $campagne,
                'questions' => $questions
            ]
        );
    }
    public function ajout($idCampagne)
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {

            $idUser = auth()->id();
            $idClient = $this->campagneModel->findClientIdByCampagneId($idCampagne);

            $clientByUser = $this->clientModel->findClientIdByUserId($idUser);


            if ($idClient == null || $clientByUser['ID_CLIENT'] != $idClient[0]['ID_CLIENT']) {
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
        //Insertion des donnés en base et redirection
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
            $idCampagne = $this->questionModel->findCampagneIdByQuestionId($idQuestion);

            $idClient = $this->campagneModel->findClientIdByCampagneId($idCampagne);

            $clientByUser = $this->clientModel->findClientIdByUserId($idUser);

            if ($idClient == null || $clientByUser['ID_CLIENT'] != $idClient[0]['ID_CLIENT']) {
                return redirect()->to("gestion-campagnes/{$clientByUser['ID_CLIENT']}");
            }
        }
        //trouve la question grace a son id
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
        //Update des donnés en base et redirection
        $question = $this->request->getPost();
        $idCampagne = $this->request->getPost('ID_CAMPAGNE');
        $this->questionModel->save($question);
        return redirect()->to("gestion-question/$idCampagne");
    }


    public function delete()
    {
        //delete des donnés en base et redirection
        $idQuestion = $this->request->getPost('ID_QUESTION');
        $idCampagne = $this->request->getPost('ID_CAMPAGNE');

        $this->questionModel->delete($idQuestion);
        return redirect()->to("gestion-question/$idCampagne");
    }
}
