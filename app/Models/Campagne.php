<?php

namespace App\Models;

use CodeIgniter\Model;

class Campagne extends Model
{
    protected $table = 'campagne';
    protected $primaryKey = 'ID_CAMPAGNE';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['ID_CLIENT', 'DATE', 'TITRE', 'LIBELLE', 'CONTACTS'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    // Supprime toutes les campagnes associées à un client spécifique
    public function deleteByClientId($idClient)
    {
        return $this
            ->where('ID_CLIENT', $idClient)
            ->delete();
    }
    // Récupère toutes les campagnes d'un client spécifique
    // Retourne une liste contenant les IDs des campagnes
    public function findCampagnesByClientId($idClient)
    {
        return $this
            ->select('ID_CAMPAGNE')
            ->where('ID_CLIENT', $idClient)
            ->findAll();
    }
    // Récupère les informations des campagnes associées à un client spécifique
    //ID_CLIENT, TITRE, et ID_CAMPAGNE
    public function findCampagnesDetailsByClientId($idClient)
    {
        return $this
            ->select('ID_CLIENT, TITRE, ID_CAMPAGNE')
            ->where('ID_CLIENT', $idClient)
            ->findAll();
    }
    // Insert la liste des contacts d'une campagne donnée
    // $idCampagne : ID de la campagne à l'insert
    // $emailListe : Liste des emails à insérer
    public function insertContactsByCampagnesId($idCampagne, $emailListe)
    {
        return $this
            ->set('CONTACTS', $emailListe)
            ->where('ID_CAMPAGNE', $idCampagne)
            ->update();
    }
    // Récupère l'ID du client associé à une campagne spécifique
    public function findClientIdByCampagneId($idCampagne)
    {
        return $this
            ->select('ID_CLIENT')
            ->where('ID_CAMPAGNE', $idCampagne)
            ->findAll();
    }
}
