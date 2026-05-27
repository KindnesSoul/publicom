<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php if (isset($errors)) { foreach ($errors as $error){ ?>
    <li><?= esc($error) ?></li>
    
<?php }}
$errors ??= session()->getFlashdata('errors');
?>


<?= form_open_multipart('ajout-message') ?>
    <fieldset>
        <legend>Ajout de message de <?= $commune['NOM'] ?></legend>

        <input name="idCommune" type="hidden" value="<?= $commune['ID'] ?>" />

        <label>Titre :</label>
        <input name="titre" type="text">
        <p class="erreur"><?=  $errors['TITRE']?? '' ?></p>

        <label>Contenu du message :</label>
        <textarea name="message"></textarea>
        <p class="erreur"><?=  $errors['CONTENU']?? '' ?></p>

        

        <label>Nom de la police de caractères du titre :</label>
        <input name="policeTitre" type="text">
        <p class="erreur"><?=  $errors['POLICETITRE']?? '' ?></p>

        <label>Nom de la police de caractères du texte :</label>
        <input name="policeTexte" type="text">
        <p class="erreur"><?=  $errors['POLICECONTENU']?? '' ?></p>

        <label>Alignement</label>
        <fieldset>
            <div>
                <input type="radio" id="gauche" name="alignement" value="gauche" />
                <label for="centre">Gauche</label>

                <input type="radio" id="centre" name="alignement" value="centre" />
                <label for="centre">Centre</label>

                <input type="radio" id="droite" name="alignement" value="droite" />
                <label for="centre">Droite</label>
            </div>
        </fieldset>
        <p class="erreur"><?=  $errors['ALIGNEMENT']?? '' ?></p>


        <label>Taille de la police du titre :</label>
        <input name="tailleTitre" type="text">
        <p class="erreur"><?=  $errors['TAILLETITRE']?? '' ?></p>

        <label>Taille de la police du texte :</label>
        <input name="tailleTexte" type="text">
        <p class="erreur"><?=  $errors['TAILLECONTENU']?? '' ?></p>

        <label>Fond :</label>
        <input name="fond" type="file" >
        <?php if (!empty($errors['fond'])){ ?>
            <p class="erreur"><?= esc($errors['fond']) ?></p>
        <?php } ?>
        

        <input name="publie" type="hidden" value=0 />

        <label>Choisir une Categorie</label>
        
        <?php if (!empty($errors['CATEGORIE'])){ ?>
            <p class="erreur"><?= esc($errors['CATEGORIE']) ?></p>
        <?php } ?>

        <select name="IDCATEGORIE" >
            <option value="1">-- Sélectionnez --</option>
            <?php
                foreach($categories as $categorie){ ?>
                    <option value="<?= $categorie["IDCATEGORIE"] ?>"><?= $categorie["NOM"] ?></option>

                <?php
                }
                ?>
        </select>
        
        
        <label>Choisir un commercant si ce message est une  publicité :</label>
        <select name="id" >
            <option value="0">-- Sélectionnez --</option>
            <?php
                foreach($commercants as $commercant){ ?>
                    <option value="<?= $commercant["id"] ?>"><?= $commercant["Libelle"] ?></option>

                <?php
                }
                ?>
        </select>
        
        

        <label>date  limite de la  publicite :</label>
        <input name="DateLimite" type="date">
        
        
        
        <input type="submit" value="Valider">
    
    </fieldset>
    <?= $this->endSection() ?>