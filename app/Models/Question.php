<?php

namespace App\Models;

use CodeIgniter\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'ID_QUESTION';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['ID_CAMPAGNE', 'QUESTION', 'TOTAL_REPONSES_1', 'TOTAL_REPONSES_2', 'TOTAL_REPONSES_3', 'TOTAL_REPONSES_4', 'TOTAL_REPONSES_5'];

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

    // Récupère toutes les questions associées à une campagne spécifique
    public function findQuestionsByCampagneId($idCampagne)
    {
        return $this
            ->select('QUESTION, ID_QUESTION, ID_CAMPAGNE')
            ->where('ID_CAMPAGNE', $idCampagne)
            ->findAll();
    }
    // Supprime toutes les questions associées à une campagne spécifique
    public function deleteQuestionsByCampagneId($idCampagne)
    {
        return $this
            ->where('ID_CAMPAGNE', $idCampagne)
            ->delete();
    }
    // Trouve l'ID de la campagne associée à une question spécifique
    public function findCampagneIdByQuestionId($idQuestion)
    {
        return $this
            ->select('ID_CAMPAGNE')
            ->where('ID_QUESTION', $idQuestion)
            ->find($idQuestion);
    }
}
