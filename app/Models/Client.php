<?php

namespace App\Models;

use CodeIgniter\Model;

class Client extends Model
{
    protected $table            = 'client';
    protected $primaryKey       = 'ID_CLIENT';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ID_UTILISATEUR', 'RAISON_SOCIALE', 'NOM', 'PRENOM', 'EMAIL', 'TELEPHONE', 'ADRESSE', 'CODE_POSTAL', 'VILLE'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function deleteClientById($clientId) {
       return $this
        ->where('ID_CLIENT', $clientId);
        return $this->db->delete('client');
    }



   
    // public function deleteClientWithCampaigns($clientId) {
    //     $this->db->beginTransaction(); // Démarrer la transaction
    
    //     try {
    //         // Suppression des questions liées aux campagnes du client
    //         $this->db->query("
    //             DELETE FROM question 
    //             WHERE ID_CAMPAGNE IN (
    //                 SELECT ID_CAMPAGNE 
    //                 FROM campagne 
    //                 WHERE ID_CLIENT = ?
    //             )
    //         ", [$clientId]);
    
    //         // Suppression des campagnes du client
    //         $this->db->delete('campagne', ['ID_CLIENT' => $clientId]);
    
    //         // Suppression du client
    //         $this->db->delete('client', ['ID_CLIENT' => $clientId]);
    
    //         $this->db->commit(); // Valider la transaction
    //     } catch (Exception $e) {
    //         $this->db->rollBack(); // Annuler la transaction en cas d'erreur
    //         // Enregistrement de l'erreur (par exemple dans un fichier ou une base de données)
    //         error_log("Erreur lors de la suppression du client : " . $e->getMessage());
    //         throw $e; // Relancer l'exception ou gérer l'erreur
    //     }
    // }

   

    // public function deleteClientWithCampaigns($clientId) {
    //     // Suppression des questions liées aux campagnes du client
    //     $this->db->query("
    //         DELETE q 
    //         FROM question q
    //         WHERE q.ID_CAMPAGNE IN (
    //             SELECT c.ID_CAMPAGNE 
    //             FROM campagne c 
    //             WHERE c.ID_CLIENT = ?
    //         )
    //     ", [$clientId]);
    
    //     // Suppression des campagnes du client
    //     $this->db->delete('campagne', ['ID_CLIENT' => $clientId]);
    
    //     // Suppression du client
    //     $this->db->delete('client', ['ID_CLIENT' => $clientId]);
    // }    
}
