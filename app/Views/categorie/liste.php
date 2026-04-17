<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-folder-open me-2"></i>Gestion des Catégories</h1>
        <a href="<?= url_to('categorie_ajout') ?>" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Nouvelle Catégorie
        </a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <?php if (empty($categories)) : ?>
                <p class="text-center text-muted">Aucune catégorie n'a été créée</p>
            <?php else : ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th class="text-center" style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie) : ?>
                            <tr>
                                <td>
                                    <i class="fas fa-folder me-2 text-warning"></i>
                                    <?= esc($categorie['NOM']) ?>
                                </td>
                                <td><?= esc($categorie['DESCRIPTION'] ?? '') ?></td>
                                <td class="text-center">
                                    <a href="<?= url_to('categorie_modifier', $categorie['IDCATEGORIE']) ?>" 
                                       class="btn btn-sm btn-warning" title="Modifier">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <a href="<?= url_to('categorie_supprimer', $categorie['IDCATEGORIE']) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"
                                       title="Supprimer">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>