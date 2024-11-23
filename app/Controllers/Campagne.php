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
        $user = auth()->user();

        if (!$user->inGroup('admin')) {
            $idUser = auth()->id();
            $idClientUser = $this->clientModel->findClient($idUser);

            if (!($idClientUser['ID_CLIENT'] == $idClient)) {
                return redirect()->to("gestion-campagnes/{$idClientUser['ID_CLIENT']}");
            }
        }
        $campagne = $this->campagneModel->findIdClient($idClient);

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
            $idClientUser = $this->clientModel->findClient($idUser);

            if (!($idClientUser['ID_CLIENT'] == $idClient)) {
                return redirect()->to("creation-campagne/{$idClientUser['ID_CLIENT']}");
            }
        }
        $idClient = $this->clientModel->find($idClient);
        return view('Campagne/creation', ['idClient' => $idClient]);
    }
    public function create()
    {
        $data = $this->request->getPost();
        $this->campagneModel->insert($data);
        $idCampagne = $this->campagneModel->getInsertID();

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
        $this->campagneModel->insertContacts($idCampagne, $emailListe);

        return redirect()->to("creation-question/$idCampagne");
    }


    public function modif($idCampagne)
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
        $campagne = $this->campagneModel->find($idCampagne);

        return view('Campagne/modif', ['campagne' => $campagne]);
    }

    public function update()
    {
        $idCampagne = $this->request->getPost('ID_CAMPAGNE');
        $data = $this->request->getPost();

        $this->campagneModel->save($data);
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

        if (!empty($lignes)) {
            $emailListe = implode(';', $lignes);
            $this->campagneModel->insertContacts($idCampagne, $emailListe);
        }
        return redirect()->to("gestion-question/$idCampagne");
    }
}
