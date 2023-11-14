<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>
<div class="addArticleAlbum" id="formAlbum">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titleAlbum">Titre :</label>
            <input type="text" id="titleAlbum" name="titleAlbum">
            <span class="error"><?php if (isset($errors['titleAlbum'])) echo $errors['titleAlbum'] ?></span>
        </div>

        <div class="form-group">
            <label for="coverAlbum">Photo :</label>
            <input type="file" id="coverAlbum" name="coverAlbum" accept="image/*">
            <span class="error"><?php if (isset($errors['coverAlbum'])) echo $errors['coverAlbum'] ?></span>
        </div>

        <div class="form-group">
            <label for="releaseAlbum">Date :</label>
            <input type="date" id="releaseAlbum" name="releaseAlbum">
            <span class="error"><?php if (isset($errors['releaseAlbum'])) echo $errors['releaseAlbum'] ?></span>
        </div>

        <div class="form-group">
            <div class="addTracks" id="addChamp">
                <label for="track">Pistes :</label>
                <button id="buttonAdd" type="button">+</button>
                <button id="buttonDelete" type="button">-</button>
                <span class="error"><?php if (isset($errors['tracks'] )) echo $errors['tracks']  ?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="descriptionAlbum">Description :</label>
            <textarea id="descriptionAlbum" name="descriptionAlbum"></textarea>
            <span class="error"><?php if (isset($errors['descriptionAlbum'])) echo $errors['descriptionAlbum'] ?></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Ajouter</button>
        </div>
        <span class="error"><?php if (isset($errors['addTheAlbum'] )) echo $errors['addTheAlbum']  ?></span>
        <span class="error"><?php if (isset($uploadMessage )) echo $uploadMessage  ?></span>
       
    </form>
</div>
<div class="tableau">
    <table>
        <tr>
            <th>ID</th>
            <th>TITRE</th>
            <th>PHOTO</th>
            <th>DATE</th>
            <th>TITRES</th>
            <th>DESCRIPTION</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach (Album::getAlbum() as $album) { ?>
            <tr>
                <td><?= $album['album_id'] ?></td>
                <td><?= $album['album_title'] ?></td>
                <td><img src="../assets/img/photo-bdd/album/<?= $album['album_cover'] ?>"></td>
                <td><?= $album['release'] ?></td>
                <td>
                    <ol class=" cols">
                        <div class="col1">
                            <li>azerty</li>
                            <li>azerty</li>
                            <li>azerty</li>
                            <li>azerty</li>
                            <li>azerty</li>
                            <li>azerty</li>
                        </div>
                        <div class="col2">
                            <li>azerty</li>
                            <li>azerty</li>
                            <li>azerty</li>
                            <li>azerty</li>
                            <li>azerty</li>
                            <li>azerty</li>
                        </div>
                    </ol>
                </td>
                <td><?= $album['album_description'] ?></td>
                <td><button class="modify-button">Modifier</button></td>
                <td><button class="delete-button">Supprimer</button></td>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="tableSmartphone">
    <div class="id">
        <p>ID: 1</p>
    </div>
    <div class="mainCard">
        <div class="titlesCard">
            <p>Date :</p>
            <span>20-10-2023</span>
        </div>
        <div class="titlesCard">
            <p>Image :</p>
            <span>band-photo.jpeg</span>
        </div>
        <div class="titlesCard">
            <p>Salle :</p>
            <span>Supersonic</span>
        </div>
        <div class="titlesCard" id="containerChar">
            <p>Ville :</p>
            <span id="maxchar3">Paris, France</span>
        </div>
        <div class="buttons">
            <button class="modify-button">Modifier</button>
            <button class="delete-button">Supprimer</button>
        </div>
    </div>
</div>
<div class="tableSmartphone">
    <div class="id">
        <p>ID: 2</p>
    </div>
    <div class="mainCard">
        <div class="titlesCard">
            <p>Date :</p>
            <span>20-10-2023</span>
        </div>
        <div class="titlesCard">
            <p>Image :</p>
            <span>band-photo.jpeg</span>
        </div>
        <div class="titlesCard">
            <p>Salle :</p>
            <span>Supersonic</span>
        </div>
        <div class="titlesCard" id="containerChar">
            <p>Ville :</p>
            <span id="maxchar3">Paris, France</span>
        </div>
        <div class="buttons">
            <button class="modify-button">Modifier</button>
            <button class="delete-button">Supprimer</button>
        </div>
    </div>
</div>

<?php include "components/footer.php" ?>