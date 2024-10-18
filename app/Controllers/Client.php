<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Database\Exceptions\DatabaseException;


class Client extends BaseController
{

    private $clientModel;
    private $campganeModel;
    private $questionModel;
    private $db;
    public function __construct()
    {
        $this->clientModel = model('Client');
        $this->campganeModel = model('Campagne');
        $this->questionModel = model('Question');
        // $db = \Config\Database::connect();
        $this->db = db_connect();
    }

    public function gestionclient(): string
    {
        $client = $this->clientModel->findAll();
        return view(
            'Client/gestion_admin',
            ['listeClients' => $client]
        );
    }

    public function ajout(): string
    {
        return view('Client/creation');
    }

    public function create(): RedirectResponse
    {
        $data = $this->request->getPost();
        $this->clientModel->insert($data);
        return redirect('gestion_admin');
    }



    public function modif($ID_CLIENT): string
    {
        $client_modif = $this->clientModel->find($ID_CLIENT);
        return view('Client\modif', ['client' => $client_modif]);
    }

    public function update(): RedirectResponse
    {
        $dataClient = $this->request->getPost();
        $this->clientModel->save($dataClient);
        return redirect('gestion_admin');
    }

    public function delete($id_client)
    {
        try {
            // Démarrer une transaction
            // $this->db->transOff();
            //die(var_dump($this->db));
           $this->db->transBegin(true);

            // Supprimer les questions associées aux campagnes du client
            $campagnes = $this->campganeModel->get_campagnes_by_client($id_client);
            if ($campagnes) {
                $this->questionModel->delete_questions_by_campagnes(array_column($campagnes, 'ID_CAMPAGNE'));
                // Supprimer les campagnes du client
                $this->campganeModel->delete_campagnes_by_client($id_client);
            }

            // Supprimer le client
            $this->clientModel->delete($id_client);

            // Valider la transaction
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            } else {
                $this->db->transCommit();
            }

            if ($this->db->transStatus() === FALSE) {
                // Gérer l'erreur
                echo "Erreur lors de la suppression.";
            } else {
                echo "Client et données associées supprimés avec succès.";
            }
            return redirect()->to('gestion_admin');
        } catch (DatabaseException $e) {
            die($e);
        }
    }
}
