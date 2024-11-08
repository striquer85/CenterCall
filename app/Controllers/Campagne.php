<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Campagne extends BaseController
{

    private $campagneModel;
    private $clientModel;

    public function __construct()
    {
        $this->campagneModel = model('Campagne');
        $this->clientModel = model('Client');
    }
    public function index(): string
    {
        return view('accueil');
    }
    public function connexion(): string
    {
        return view('connexion');
    }
    public function dashboard($ID_CLIENT): string
    {

        // récupére tous les campagnes de la table avec "findAll()" 

        $campagne = $this->campagneModel->findIdClient($ID_CLIENT);
        $idClient = $this->clientModel->find($ID_CLIENT);

        return view('Campagne/gestion', [
            'listeCampagnes' => $campagne,
            'client' => $idClient
        ]);
    }

    public function ajout($ID_CLIENT): string
    {
        $idClient = $this->clientModel->find($ID_CLIENT);
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


    public function modif($ID_CAMPAGNE): string
    {
        $campagne = $this->campagneModel->find($ID_CAMPAGNE);

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
