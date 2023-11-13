<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>
<div class="addComposantbutton">
    <button>Ajouter une date de concert</button>
</div>
<div class="form-error"><?= $errors['bdd'] ?? '' ?></div>
<div class="form-error"><?= $success ?? '' ?></div>

<div class="addArticleDate">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="picture">Photo :</label>
            <input type="file" id="picture" name="picture">
            <span class="error"><?php if (isset($errors['picture'])) echo $errors['picture']; ?></span>
        </div>

        <div class="form-group">
            <label for="dateTour">Date :</label>
            <input type="date" id="dateTour" name="dateTour">
            <span class="error"><?php if (isset($errors['dateTour'])) echo $errors['dateTour']; ?></span>
        </div>

        <div class="form-group">
            <label for="country">Pays :</label>
            <input type="text" id="country" name="country">
            <span class="error"><?php if (isset($errors['country'])) echo $errors['country']; ?></span>
        </div>

        <div class="form-group">
            <label for="city">Ville :</label>
            <input type="text" id="city" name="city">
            <span class="error"><?php if (isset($errors['city'])) echo $errors['city']; ?></span>
        </div>

        <div class="form-group">
            <label for="room">Salle :</label>
            <input type="text" id="room" name="room">
            <span class="error"><?php if (isset($errors['room'])) echo $errors['room']; ?></span>
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
            <th>LIEU</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach (Tour::getTour() as $tour) { ?>
            <tr>
                <td><?= $tour['tour_id'] ?></td>
                <td><?= $tour["tour_picture"] ?></td>
                <td><?= $tour["date"] ?></td>
                <td><?= $tour["tour_room"] ?></td>
                <td><?= $tour["tour_city"] ?>, <?= $tour["tour_country"] ?></td>
                <td><button class="modify-button">Modifier</button></td>
                <td><button class="delete-button">Supprimer</button></td>
            </tr>
        <?php } ?>
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