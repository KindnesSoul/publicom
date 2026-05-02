<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<div class="container mt-4">
    <?php
        // Normalisation des clés pour éviter les erreurs si la BDD utilise des majuscules
        $catNom = $categorie['NOM'] ?? $categorie['nom'] ?? 'Nom indisponible';
        $catDescription = $categorie['DESCRIPTION'] ?? $categorie['description'] ?? '';
    ?>
    <h2>Messages de la catégorie : <?= esc($catNom) ?></h2>
    <?php if ($catDescription !== ''): ?>
        <p class="text-muted"><?= esc($catDescription) ?></p>
    <?php endif; ?>

    <div class="mb-3">
        <a href="/categories" class="btn btn-secondary">Retour aux catégories</a>
    </div>

    <?php if (empty($messages)) : ?>
        <div class="alert alert-info">
            Aucun message n'est associé à cette catégorie.
        </div>
    <?php else : ?>
        <div class="row">
            <?php foreach ($messages as $message) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($message['TITRE']) ?></h5>
                            <p class="card-text"><?= esc(substr($message['CONTENU'], 0, 100)) ?>...</p>
                            <a class="bouton" href='<?= url_to('visu_message', $message['ID']) ?>'> Visualisation </a>
                                Voir le message
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>