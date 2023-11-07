<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>
<div class="addComposantbutton">
    <button>Ajouter une date de concert</button>
</div>
<div class="addArticleDate">
<form action="traitement.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titre">Photo :</label>
            <input type="text" id="titre" name="titre" required>
        </div>

        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="salle">salle :</label>
            <input type="text" id="salle" name="salle" required>
        </div>

        <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
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
            <th>PHOTO</th>
            <th>DATE</th>
            <th>SALLE</th>
            <th>VILLE</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>1</td>
            <td>band-photo.jpg</td>
            <td>20-10-2023</td>
            <td>Supersonic</td>
            <td>Paris, France</td>
            <td><button class="modify-button">Modifier</button></td>
            <td><button class="delete-button">Supprimer</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>band-photo.jpg</td>
            <td>20-10-2023</td>
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