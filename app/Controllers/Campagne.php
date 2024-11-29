<?php

namespace App\Controllers;

class Campagne extends BaseController
{

    private $campagneModel;
    private $clientModel;

    public function __construct()
    {
        $this->campagneModel = model('Campagne');
        $this->clientModel = model('Client');
    }

    public function dashboard($idClient)
    {
        //Test pour voir si le compte est admin aucun traitement
        $user = auth()->user();
        if (!$user->inGroup('admin')) {
            $idUser = auth()->id();
            $idClientUser = $this->clientModel->findClientIdByUserId($idUser);

            //Test pour voir si le compte tente d'acceder a d'autre page que les siens (sécurité du site)
            //Renvoie vers leur gestion campagne 
            if (!($idClientUser['ID_CLIENT'] == $idClient)) {
                return redirect()->to("gestion-campagnes/{$idClientUser['ID_CLIENT']}");
            }
        }
        //Renvoie les information de la campagne Titre,id...
        $campagne = $this->campagneModel->findCampagnesDetailsByClientId($idClient);

        $idClient = $this->clientModel->find($idClient);

        return view('Campagne/gestion', [
            'listeCampagnes' => $campagne,
            'client' => $idClient,
            'admin' => $user && $user->inGroup('admin')
        ]);
    }

    public function ajout($idClient)
    {
        $user = auth()->user();

        if (!$user->inGroup('admin')) {
            $idUser = auth()->id();
            $idClientUser = $this->clientModel->findClientIdByUserId($idUser);

            if (!($idClientUser['ID_CLIENT'] == $idClient)) {
                return redirect()->to("creation-campagne/{$idClientUser['ID_CLIENT']}");
            }
        }
        $idClient = $this->clientModel->find($idClient);
        return view('Campagne/creation', ['idClient' => $idClient]);
    }
    public function create()
    {
        //insert les donné de la campagne en base
        $data = $this->request->getPost();
        $this->campagneModel->insert($data);
        $idCampagne = $this->campagneModel->getInsertID();

        //Traitement sur le fichier csv des contacts 
        $csvFile = $this->request->getFile('CONTACTS');
        $lignes = [];

        if ($csvFile->isValid()) {
            if (($handle = fopen($csvFile->getTempName(), "r")) !== FALSE) {
                while (($email = fgets($handle, 1000)) !== FALSE) {
                    $lignes[] = $email;
                }
                fclose($handle);
            }
        }

        $emailListe = implode(';', $lignes);
        //Insert des contacts en base email sépare par des ;
        $this->campagneModel->insertContactsByCampagnesId($idCampagne, $emailListe);

        return redirect()->to("creation-question/$idCampagne");
    }


    public function modif($idCampagne)
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
        $campagne = $this->campagneModel->find($idCampagne);

        return view('Campagne/modif', ['campagne' => $campagne]);
    }

    public function update()
    {
        //update les donné de la campagne en base
        $idCampagne = $this->request->getPost('ID_CAMPAGNE');
        $data = $this->request->getPost();

        $this->campagneModel->save($data);
        $csvFile = $this->request->getFile('CONTACTS');
        $lignes = [];
        //Traitement sur le fichier csv des contacts
        if ($csvFile->isValid()) {
            if (($handle = fopen($csvFile->getTempName(), "r")) !== FALSE) {
                while (($email = fgets($handle, 1000)) !== FALSE) {
                    $lignes[] = $email;
                }
                fclose($handle);
            }
        }
        //Test si y a pas de contacts remplis (non requis)
        //sinon insertion
        if (!empty($lignes)) {
            $emailListe = implode(';', $lignes);
            $this->campagneModel->insertContactsByCampagnesId($idCampagne, $emailListe);
        }
        return redirect()->to("gestion-question/$idCampagne");
    }
}
