<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table            = 'message';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ID_COMMUNEMESSAGE',"ID_CATEGORIEMESSAGE", 'TITRE', 'CONTENU', 'POLICETITRE', 'POLICECONTENU', 'ALIGNEMENT', 'FOND', 'TAILLECONTENU', 'TAILLETITRE', 'PUBLIE', 'id_categorie'];

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
    protected $validationRules      = [
        'TITRE' => 'required',
        'CONTENU' => 'required',
        'POLICETITRE' => 'alpha_space',
        'POLICECONTENU' => 'alpha_space',
        'ALIGNEMENT' => 'required',
        'TAILLETITRE' => 'required|integer'
    ];
    protected $validationMessages   = [
        'TITRE' => [
            'required' => 'Le titre du message est obligatoire',
        ],
        'CONTENU' => [
            'required' => 'Le contenu du message est obligatoire',
        ],
        'POLICETITRE' =>[
            'alpha_space' => 'La police du titre ne peut contenir que des lettres'
        ],
        'POLICECONTENU' =>[
            'alpha_space' => 'La police du contenu ne peut contenir que des lettres'
        ],
        'ALIGNEMENT' =>[
            'required' => 'Choissisez un alignement pour le message'
        ],
        'TAILLETITRE' => [
            'required' => 'La taille de la police est obligatoire',
            'integer' => 'il ne faut utiliser que des chiffres pour la taille de la police'
        ]

    ];
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

    public function message_maxId()
    {
        $row = $this->selectMax('ID')->first();
        return (int) $row['ID'];
    }

    public function messageInCommune($idCommune)
    {
        return $this
            ->select("ID")
            ->where("ID_COMMUNEMESSAGE", $idCommune)
            ->findAll();
    }
}
