<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>
<div class="addComposantbutton">
    <button id="addTourButton">Ajouter une date de concert</button>
</div>
<div class="form-error"><?= $errors['bdd'] ?? '' ?></div>
<div class="addArticleDate" id="formTour">
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
                <td><img src="data:image/png;base64,<?= $tour["tour_picture"] ?>" alt=""></td>
                <td><?= $tour["date"] ?></td>
                <td><?= $tour["tour_room"] ?></td>
                <td><?= $tour["tour_city"] ?>, <?= $tour["tour_country"] ?></td>
                <td><button class="modify-button">Modifier</button></td>
                <td><button class="delete-button">Supprimer</button></td>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="tableSmartphone">
    <?php foreach (Tour::getTour() as $tour) { ?>
        <div class="id">
            <p>ID: <?= $tour['tour_id'] ?></p>
        </div>
        <div class="mainCard">
            <div class="titlesCard">
                <p>Date :</p>
                <span><?= $tour["date"] ?></span>
            </div>
            <div class="titlesCard">
                <p>Image :</p>
                <img src="data:image/png;base64,<?= $tour["tour_picture"] ?>" alt="">
            </div>
            <div class="titlesCard">
                <p>Salle :</p>
                <span><?= $tour["tour_room"] ?></span>
            </div>
            <div class="titlesCard" id="containerChar">
                <p>Ville :</p>
                <span id="maxchar3"><?= $tour["tour_city"] ?>, <?= $tour["tour_country"] ?></span>
            </div>
            <div class="buttons">
                <button class="modify-button">Modifier</button>
                <button class="delete-button">Supprimer</button>
            </div>
        </div>
    <?php } ?>
</div>

<?php include "components/footer.php" ?>