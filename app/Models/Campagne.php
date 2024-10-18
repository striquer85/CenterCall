<?php

namespace App\Models;

use CodeIgniter\Model;

class Campagne extends Model
{
    protected $table            = 'campagne';
    protected $primaryKey       = 'ID_CAMPAGNE';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ID_CLIENT', 'DATE', 'TITRE', 'LIBELLE', 'CONTACTS'];

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



    public function deleteCampaignsAndQuestionsByClientId($clientId)
    {


        // Récupérer les IDs des campagnes
        $campagne_ids = $this->select('ID_CAMPAGNE')
            ->where('ID_CLIENT', $clientId)->findAll();
        $campagnes = $this->get('campagne')->result();


        // Supprimer les questions associées
        foreach ($campagne_ids as $campagne) {
            var_dump($campagne);
            $this->where('ID_CAMPAGNE', $campagne);
            $this->delete('question');
        }

        // Supprimer les campagnes
        return $this->delete('campagne', 'ID_CLIENT', $clientId);
    }


    public function findIDClient($ID_CLIENT)
    {
        return $this
            ->select('ID_CLIENT, TITRE, ID_CAMPAGNE')
            ->where('ID_CLIENT', $ID_CLIENT)
            ->findAll();
    }

    public function get_campagnes_by_client($ID_CLIENT)
    {
        return $this->where('ID_CLIENT', $ID_CLIENT)
            ->findAll();
    }

    public function delete_campagnes_by_client($ID_CLIENT)
    {
        $this
            ->where('ID_CLIENT', $ID_CLIENT)
            ->delete('campagne');
    }
}
