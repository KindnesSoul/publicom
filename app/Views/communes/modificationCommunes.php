<?= $this->extend('layout') ?>



 <?= $this->section('contenu') ?>

 <div class="container">
        <div class="commune-row">
           <form action="<?= url_to('updateCommunes',$commune['ID']) ?>" method="post">
                <input type="text" name="message" id="message" value="" style="height: 400px; width: 500px;" onclick="this.value=''" />

                <label for="nom">Éditer nom </label>
                <input type="text" id="nom" name="nom" value="<?= $commune['NOM'] ?>"><br><br>

                <label for="nom">Éditer le code code Postal</label>
                <input type="text" id="codePostal" name="code Postal" value="<?= $commune['CODEPOSTAL'] ?>"><br><br>

                <label for="nom">Éditer la description </label>
                <input type="text" id="description" name="description" value="<?= $commune['DESCRIPTION'] ?>"><br><br>
                
                <input type="submit" value="Valider">
                
            </form>

        </div>
    </body>