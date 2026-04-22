<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    protected $table            = 'categorie';
    protected $primaryKey       = 'IDCATEGORIE'; // ← CORRECTION ICI
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['NOM', 'DESCRIPTION'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules = [
        'NOM' => 'required|min_length[3]|max_length[100]',
        'DESCRIPTION' => 'permit_empty|max_length[255]'
    ];

    protected $validationMessages = [
        'NOM' => [
            'required' => 'Le nom de la catégorie est obligatoire',
            'min_length' => 'Le nom doit contenir au moins 3 caractères',
            'max_length' => 'Le nom ne peut pas dépasser 100 caractères'
        ]
    ];

    // Méthode pour obtenir les messages d'une catégorie
    public function getMessages($categorieId)
    {
        $messageModel = model('MessageModel');
        return $messageModel->where('ID_CATEGORIEMESSAGE', $categorieId)->findAll();
    }
    public function getAllCategorie(){
        return $this
        -> select("IDCATEGORIE, NOM")
        ->findAll();
    }
}