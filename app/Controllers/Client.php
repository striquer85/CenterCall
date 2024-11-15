<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Client extends BaseController
{
    private $clientModel;
    private $campagneModel;
    private $questionModel;
    private $userModel;
    private $db;

    public function __construct()
    {
        $this->clientModel = model('Client');
        $this->campagneModel = model('Campagne');
        $this->questionModel = model('Question');
        $this->userModel = model('UserModel');
        $this->db = db_connect();
    }

    public function gestionclient(): string
    {

        $user = auth()->user();
        if (! $user->inGroup('admin')) {
            $user_id = auth()->id();

            $idClient = $this->clientModel->findClient($user_id);
           
            return redirect()->to("gestion-campagnes/{$idClient['ID_CLIENT']}");
        }
        $client = $this->clientModel->findAll();
        return view('Client/gestion_admin', ['listeClients' => $client]);
    }
    public function ajout(): string
    {
        $listeUser = $this->userModel->findAll();
        return view('Client/creation', ['listeUser' => $listeUser]);
    }

    public function create(): RedirectResponse
    {
        $data = $this->request->getPost();
        $this->clientModel->insert($data);
        return redirect()->to('gestion-clients');
    }

    public function modif($idClient): string
    {
        $client_modif = $this->clientModel->find($idClient);
        $listeUser = $this->userModel->findAll();
        return view('Client/modif', [
            'client' => $client_modif,
            'listeUser' => $listeUser
        ]);
    }

    public function update(): RedirectResponse
    {
        $dataClient = $this->request->getPost();
        $this->clientModel->save($dataClient);
        return redirect()->to('gestion-clients');
    }

    public function delete($idClient): RedirectResponse
    {
        $this->db->transStart();
        $clientIdSup = $this->clientModel->find($idClient);
        $idUserSup = $clientIdSup['ID_UTILISATEUR'];

        $this->userModel->delete($idUserSup);
        // if ($this->$idUserSup['deleted_at'] == null) {
        //     $this->userModel->delete($idUserSup);
        // }

        $idCampagne = $this->campagneModel->get_campagnes_by_client($idClient);
        if ($idCampagne) {
            foreach ($idCampagne as $campagne) {
                $this->questionModel->delete_questions_by_campagnes($campagne['ID_CAMPAGNE']);
            }
            $this->campagneModel->delete_campagnes_by_client($idClient);
        }

        $this->clientModel->delete($idClient);



        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            throw new DatabaseException("Erreur lors de la suppression.");
        }
        return redirect()->to('gestion-clients');
    }
}
