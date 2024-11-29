<?php

namespace App\Controllers;

use CodeIgniter\Database\Exceptions\DatabaseException;

class Client extends BaseController
{
    private $clientModel;
    private $campagneModel;
    private $questionModel;
    private $userModel;
    private $db;

    /* ------------------------ creation du constructeur ------------------------ */
    /*implementtation des model et db                                             */
    /* -------------------------------------------------------------------------- */


    public function __construct()
    {

        $this->clientModel = model('Client');
        $this->campagneModel = model('Campagne');
        $this->questionModel = model('Question');
        $this->userModel = model('UserModel');
        $this->db = db_connect();
    }
    /* ------------------------ gestion des clients ------------------------ */
    /* affichage des clients avec leur information et leur entreprise        */
    /* ----------------------------------------------------------------------*/
    public function gestionclient()
    {

        /* ------------------------ test de la methode admin ------------------------ */
        /*test si utilisateur est admin                                               */
        /*si il est admin il va aller vers le dashboard gestion clients               */
        /*sinon il va aller vers la gestion des clients                               */
        /*si il est connecte mais pas admin il va aller                               */
        /*vers le dashboard des campagne associé au client                            */
        /* ---------------------------------------------------------------------------*/

        $user = auth()->user();

        if (!$user->inGroup('admin')) {
            $user_id = auth()->id();

            $idClient = $this->clientModel->findClientIdByUserId($user_id);

            return redirect()->to("gestion-campagnes/{$idClient['ID_CLIENT']}");
        }
        $client = $this->clientModel->findAll();
        return view('Client/gestion_admin', ['listeClients' => $client]);
    }
    /* ---------------------------- ajout d'un client --------------------------- */
    /* affichage de la page de creation d'un client                               */
    /* affichage de la liste des utilisateurs                                     */
    /* recuprerations des clients et des utilisateurs                             */
    /* -------------------------------------------------------------------------- */
    public function ajout()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {
            $user_id = auth()->id();

            $idClient = $this->clientModel->findClientIdByUserId($user_id);

            return redirect()->to("gestion-campagnes/{$idClient['ID_CLIENT']}");
        }

        $listeUser = $this->userModel->findAll();
        return view('Client/creation', ['listeUser' => $listeUser]);
    }

    /* -------------------------- creation d'un client -------------------------- */
    /* recuprerations des clients et des utilisateurs                             */
    /* creation d'un client dans la base de donnée                                */
    /* redirection vers la gestion des clients                                    */
    /* -------------------------------------------------------------------------- */

    public function create()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {
            $user_id = auth()->id();

            $idClient = $this->clientModel->findClientIdByUserId($user_id);

            return redirect()->to("gestion-campagnes/{$idClient['ID_CLIENT']}");
        }
        $data = $this->request->getPost();
        $this->clientModel->insert($data);
        return redirect()->to('gestion-clients');
    }
    /* ------------------------- modification de client ------------------------- */
    /* affichage de la page de modification d'un client                           */
    /* affichage de la liste des utilisateurs                                     */
    /* recuprerations des clients et des utilisateurs                             */
    /* -------------------------------------------------------------------------- */
    public function modif($idClient)
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {
            $user_id = auth()->id();

            $idClient = $this->clientModel->findClientIdByUserId($user_id);

            return redirect()->to("gestion-campagnes/{$idClient['ID_CLIENT']}");
        }
        $client_modif = $this->clientModel->find($idClient);
        $listeUser = $this->userModel->findAll();
        return view('Client/modif', [
            'client' => $client_modif,
            'listeUser' => $listeUser
        ]);
    }
    /* --------------- aplication des modifications sur le client --------------- */
    /* update des données du client dans la base de donnée                        */
    /* redirection vers la gestion des clients                                    */
    /* -------------------------------------------------------------------------- */
    public function update()
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {
            $user_id = auth()->id();

            $idClient = $this->clientModel->findClientIdByUserId($user_id);

            return redirect()->to("gestion-campagnes/{$idClient['ID_CLIENT']}");
        }
        $dataClient = $this->request->getPost();
        $this->clientModel->save($dataClient);
        return redirect()->to('gestion-clients');
    }

    /* ------------------------ suppression d'un client ------------------------ */
    /* recuprerations des informations du client                                 */
    /* recuprerations des utilisateurs                                           */
    /* recuprerations des campagnes du client                                    */
    /* recuprerations des questions de la campagne                               */
    /* suppression des campagnes                                                 */
    /* suppression des questions                                                 */
    /* suppression des utilisateurs                                              */
    /* suppression d'un client dans la base de donnée                            */
    /* redirection vers la gestion des clients                                   */
    /* --------------------------------------------------------------------------*/

    public function delete($idClient)
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {
            $user_id = auth()->id();

            $idClient = $this->clientModel->findClientIdByUserId($user_id);

            return redirect()->to("gestion-campagnes/{$idClient['ID_CLIENT']}");
        }
        $this->db->transStart();
        $clientIdSup = $this->clientModel->find($idClient);
        $idUserSup = $clientIdSup['ID_UTILISATEUR'];

        $this->userModel->delete($idUserSup);
        $idCampagne = $this->campagneModel->findCampagnesByClientId($idClient);
        if ($idCampagne) {
            foreach ($idCampagne as $campagne) {
                $this->questionModel->deleteQuestionsByCampagneId($campagne['ID_CAMPAGNE']);
            }
            $this->campagneModel->deleteByClientId($idClient);
        }
        $this->clientModel->delete($idClient);
        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            throw new DatabaseException("Erreur lors de la suppression.");
        }
        return redirect()->to('gestion-clients');
    }
}
