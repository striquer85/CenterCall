<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = model('Client');
    }
    public function index()
    {
        //Test si le compte est admin redirection vers gestion clients sinon vers c'est campagne
        $user = auth()->user();
        if (!$user->inGroup('admin')) {
            $user_id = auth()->id();

            $idClient = $this->clientModel->findClientIdByUserId($user_id);

            //Test si l'utilisateur a un compte client atribué  sinon redirection vers la page de login
            if ($idClient == null) {
                session()->setFlashdata('errors', 'Vous n\'avez pas encore de client attribué. Attendez que un administrateur vous le crée.');
                auth()->logout();
                return redirect()->to('/login');
            } else {
                return redirect()->to("gestion-campagnes/{$idClient['ID_CLIENT']}");
            }
        }
        return redirect()->to("gestion-clients");
    }
}
