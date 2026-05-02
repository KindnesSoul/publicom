<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Categorie extends BaseController
{
    public function index()
    {
        $categorieModel = model('CategorieModel');
        $categories = $categorieModel->findAll();

        return view('categorie/liste', ['categories' => $categories]);
    }

    public function ajout()
    {
        return view('categorie/ajout');
    }

    public function create()
    {
        $categorieModel = model('CategorieModel');
        
        $data = [
            'NOM' => $this->request->getPost('nom'),
            'DESCRIPTION' => $this->request->getPost('description')
        ];

        if ($categorieModel->save($data)) {
            return redirect()->to('/categories')->with('success', 'Catégorie créée avec succès');
        }

        return redirect()->back()->withInput()->with('errors', $categorieModel->errors());
    }

    public function modifier($id)
    {
        $categorieModel = model('CategorieModel');
        $categorie = $categorieModel->find($id);

        if ($categorie) {
            return view('categorie/modifier', ['categorie' => $categorie]);
        }

        return redirect()->to('/categories')->with('error', 'Catégorie non trouvée');
    }

    public function update($id)
    {
        $categorieModel = model('CategorieModel');
        
        $data = [
            'IDCATEGORIE' => $id,
            'NOM' => $this->request->getPost('nom'),
            'DESCRIPTION' => $this->request->getPost('description')
        ];

        if ($categorieModel->save($data)) {
            return redirect()->to('/categories')->with('success', 'Catégorie mise à jour avec succès');
        }

        return redirect()->back()->withInput()->with('errors', $categorieModel->errors());
    }

    public function supprimer($id)
    {
        $categorieModel = model('CategorieModel');
        
        if ($categorieModel->delete($id)) {
            return redirect()->to('/categories')->with('success', 'Catégorie supprimée avec succès');
        }

        return redirect()->back()->with('error', 'Erreur lors de la suppression de la catégorie');
    }

    public function messages($id)
    {
        $categorieModel = model('CategorieModel');
        $categorie = $categorieModel->find($id);
        
        $messages = $categorieModel->getMessages($id,session()->get('IdCommune'));

        return view('categorie/messages', [
            'categorie' => $categorie,
            'messages' => $messages
        ]);
    }
}