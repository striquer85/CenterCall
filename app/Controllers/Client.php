<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Client extends BaseController
{
    private $clientModel;
    private $campagneModel; // Corrected variable name
    private $questionModel;
    private $db;

    public function __construct()
    {
        $this->clientModel = model('Client');
        $this->campagneModel = model('Campagne'); // Corrected variable name
        $this->questionModel = model('Question');
        $this->db = db_connect();
    }

    public function gestionclient(): string
    {
        $client = $this->clientModel->findAll();
        return view('Client/gestion_admin', ['listeClients' => $client]);
    }

    public function ajout(): string
    {
        return view('Client/creation');
    }

    public function create(): RedirectResponse
    {
        $data = $this->request->getPost();
        $this->clientModel->insert($data);
        return redirect('gestion_admin'); // Use `redirect()->to()`
    }

    public function modif($ID_CLIENT): string
    {
        $client_modif = $this->clientModel->find($ID_CLIENT);
        return view('Client/modif', ['client' => $client_modif]); // Use forward slashes
    }

    public function update(): RedirectResponse
    {
        $dataClient = $this->request->getPost();
        $this->clientModel->save($dataClient);
        return redirect('gestion_admin'); // Use `redirect()->to()`
    }

    public function delete($id_client): RedirectResponse
    {
        // Démarrer une transaction
        $this->db->transStart();


        // Supprimer les questions associées aux campagnes du client
        $campagnesId = $this->campagneModel->get_campagnes_by_client($id_client);
        if ($campagnesId) {
            $idstmp = array_column($campagnesId, 'ID_CAMPAGNE');

            $i = 0;
            $str2 = "";
            while (ISSET($idstmp[$i]))
            {
                $this->questionModel->delete_questions_by_campagnes($idstmp[$i]);
                $str2 .=$idstmp[$i].";";
                $i++;
            }
            // Supprimer les campagnes du client
            $i = 0;
            $str = "";
            while (ISSET($idstmp[$i]))
            {
                $this->campagneModel->delete_campagnes_by_client($idstmp[$i]);
                $str .= $idstmp[$i].";";
                $i++;
            }
            die("str campagnes : ".$str."<br />str questions : ".$str2);
        }

        // Supprimer le client
        $this->clientModel->delete($id_client);

        // Valider la transaction

        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            // Gérer l'erreur
            echo "Erreur lors de la suppression.";
        } else {
            echo "Client et données associées supprimés avec succès.";
        }

        return redirect('gestion_admin');
    }
}
