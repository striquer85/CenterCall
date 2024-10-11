<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Campagne extends BaseController
{

    private  $campagnetModel;
    private  $clientModel;

    public function __construct()
    {
        $this->campagnetModel = model('Campagne');
        $this->clientModel = model('Client');
    }
    public function index(): string
    {
        return view('accueil');
    }
    public function dashboard($ID_CLIENT): string
    {

        // récupére tous les campagnes de la table avec "findAll()" 

        $campagne = $this->campagnetModel->findIdClient($ID_CLIENT);
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
        $idClient = $this->request->getPost('ID_CLIENT');
        $data = $this->request->getPost();
        
         //var_dump($data);
        if($_FILES['CONTACTS']) // vérifie si un fichier a été téléchargé et si le champ monFichier est rempli
        {
            $contenu = file_get_contents($_FILES['CONTACTS']['tmp_name']); //récupère le contenu du fichier
            system("unlink '".$_FILES['CONTACTS']['tmp_name']."'"); // supprime le fichier temporaire grace à "unlink"
            $tableau = explode('
', $contenu); // prend le contenu du fichier et le divise en un tableau (!! garder le retour à la ligne)
            foreach ($tableau as $ligne) {
                if ($ligne != "")
                {
                    $contact = explode(';', $ligne);
                    echo("<pre>");
                    print_r($contact);
                    echo("</pre>");
                    
                }
            }
            //die();
            $this->campagnetModel->insert($data);
        }
        return redirect()->to("gestion-campagnes/$idClient");
    }

    public function modif($ID_CAMPAGNE): string
    {
        $campagne = $this->campagnetModel->find($ID_CAMPAGNE);

        return view('Campagne/modif', ['campagne' => $campagne]);
    }

    public function update()
    {
        $idClient = $this->request->getPost('ID_CLIENT');
        //$idCampagne = $this->request->getPost('ID_CAMPAGNE');
        $data = $this->request->getPost();

        $this->campagnetModel->save($data);
        //return redirect()->to("gestion-question/$idCampagne");
        return redirect()->to("gestion-campagnes/$idClient");
    }
}
