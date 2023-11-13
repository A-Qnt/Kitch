<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>
<div class="addComposantbutton">
    <button id="addAlbumButton">Ajouter un album</button>
</div>
<div class="addArticleAlbum" id="formAlbum">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titleAlbum">Titre :</label>
            <input type="text" id="titleAlbum" name="titleAlbum" required>
        </div>

        <div class="form-group">
            <label for="coverAlbum">Photo :</label>
            <input type="file" id="coverAlbum" name="coverAlbum" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="releaseAlbum">Date :</label>
            <input type="date" id="releaseAlbum" name="releaseAlbum" required>
        </div>

        <div class="form-group">
            <div class="addTracks" id="addChamp">
                <label for="track">Pistes :</label>
                <button id="buttonAdd" type="button">+</button>
                <button id="buttonDelete" type="button">-</button>
            </div>
        </div>

        <div class="form-group">
            <label for="descriptionAlbum">Description :</label>
            <textarea id="descriptionAlbum" name="descriptionAlbum" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Ajouter</button>
        </div>
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
        <tr>
            <td>1</td>
            <td>20-10-2023</td>
            <td>band-photo.jpg</td>
            <td>Supersonic</td>
            <td>
                <ol class="cols">
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
            <td>Dans “Calame”, leur nouvel album, Kitch nous propose un voyage dans un monde alternatif qui s’étire du post-rock au trip-hop. Sans vraiment passer par la musique pop.</td>
            <td><button class="modify-button">Modifier</button></td>
            <td><button class="delete-button">Supprimer</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>20-10-2023</td>
            <td>band-photo.jpg</td>
            <td>Supersonic</td>
            <td>Paris, France</td>
            <td><button class="modify-button">Modifier</button></td>
            <td><button class="delete-button">Supprimer</button></td>
        </tr>
        <!-- Ajoutez d'autres lignes de données ici -->
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