<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>



<?php 
$errors ??= session()->getFlashdata('errors');
?>

<?= form_open_multipart('modif-message') ?>
    <fieldset>
        <legend>Modification de message de <?= $commune['NOM'] ?></legend>

        <input name="idMessage" type="hidden" value="<?= $message['ID'] ?>" />

        <input name="idCommune" type="hidden" value="<?= $message['ID_COMMUNEMESSAGE'] ?>" />

        <label>Titre :</label>
        <input name="titre" type="text" value="<?= $message['TITRE'] ?>">
        <p class="erreur"><?=  $errors['TITRE']?? '' ?></p>

        <label>Contenu du message :</label>
        <textarea name="message"><?= $message['CONTENU']?></textarea>
        <p class="erreur"><?=  $errors['CONTENU']?? '' ?></p>

        <label>Nom de la police de caractères du titre :</label>
        <input name="policeTitre" type="text" value="<?= $message['POLICETITRE'] ?>">
        <p class="erreur"><?=  $errors['POLICETITRE']?? '' ?></p>

        <label>Nom de la police de caractères du texte :</label>
        <input name="policeTexte" type="text" value="<?= $message['POLICECONTENU'] ?>">
        <p class="erreur"><?=  $errors['POLICECONTENU']?? '' ?></p>

        <label>Alignement</label>
        <fieldset>
            <div>
                <input type="radio" id="gauche" name="alignement" value="gauche" <?php if($message['ALIGNEMENT']=="gauche"){echo 'checked';} ?> />
                <label for="centre">Gauche</label>

                <input type="radio" id="centre" name="alignement" value="centre" <?php if($message['ALIGNEMENT']=="centre"){echo 'checked';} ?>/>
                <label for="centre">Centre</label>

                <input type="radio" id="droite" name="alignement" value="droite" <?php if($message['ALIGNEMENT']=="droite"){echo 'checked';} ?>/>
                <label for="centre">Droite</label>
            </div>
        </fieldset>
        <p class="erreur"><?=  $errors['ALIGNEMENT']?? '' ?></p>


        <label>Taille de la police du titre :</label>
        <input name="tailleTitre" type="text" value="<?= $message['TAILLETITRE'] ?>">
        <p class="erreur"><?=  $errors['TAILLETITRE']?? '' ?></p>

        <label>Taille de la police du texte :</label>
        <input name="tailleTexte" type="text" value="<?= $message['TAILLECONTENU'] ?>">
        <p class="erreur"><?=  $errors['TAILLECONTENU']?? '' ?></p>

        <label>Fond :</label>
        <input name="fond" type="file" >
        <?php if (isset($errors)) { foreach ($errors as $error){ ?>
            <p class="erreur"><?= esc($error) ?></p>
        <?php }} ?>

        <label>Choisir une Categorie</label>
        <select name="IDCATEGORIE" >
            <?php if ($message["ID_CATEGORIEMESSAGE"]){ ?>

                <option value="<?= $message["ID_CATEGORIEMESSAGE"] ?>"><?= $yourCategorie["NOM"] ?></option>
            
            <?php }else{ ?>
                <option value="">-- Sélectionnez --</option>
            <?php } ?>
            
            <?php
                foreach($categories as $categorie){ ?>
                    <option value="<?= $categorie["IDCATEGORIE"] ?>"><?= $categorie["NOM"] ?></option>

                <?php
                }
                ?>
        </select>

        <input type="submit" value="Valider">
    </fieldset>
</form>
<?= $this->endSection() ?>