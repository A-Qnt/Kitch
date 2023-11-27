<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>

<div class="modale" id="modale">
    <p>Voulez-vous vraiment supprimer cet article ?</p>
    <button class="btnret" id="cancel">Annuler</button>
    <form action="../controllers/controller-admin-article-delete.php" method="POST">
        <input type="hidden" id="newsToDelete" name="newsToDelete">
        <button class="btnret" id="confirm">Confirmer</button>
    </form>
</div>

<div class="form-error"><?= $errors['bdd'] ?? '' ?></div>
<div class="addArticleForm" id="formArticle">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titleArticle">Titre :</label>
            <input type="text" id="titleArticle" name="titleArticle">
            <span class="error"><?php if (isset($errors['titleArticle'])) echo $errors['titleArticle']; ?></span>
        </div>

        <div class="form-group">
            <label for="dateArticle">Date :</label>
            <input type="date" id="dateArticle" name="dateArticle">
            <span class="error"><?php if (isset($errors['dateArticle'])) echo $errors['dateArticle']; ?></span>
        </div>

        <div class="form-group">
            <label for="pictureArticle">Image :</label>
            <input type="file" id="pictureArticle" name="pictureArticle" accept="image/*">
            <span class="error"><?php if (isset($errors['pictureArticle'])) echo $errors['pictureArticle']; ?></span>
        </div>

        <div class="form-group">
            <label for="contentArticle">Contenu :</label>
            <textarea id="contentArticle" name="contentArticle"></textarea>
            <span class="error"><?php if (isset($errors['contentArticle'])) echo $errors['contentArticle']; ?></span>
        </div>

        <div class="form-group">
            <label for="linkArticle">Liens d'acces :</label>
            <input type="text" id="linkArticle" name="linkArticle">
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
            <th>DATE</th>
            <th>PHOTO</th>
            <th>CONTENU</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach (News::getNews() as $news) { ?>
            <tr>
                <td><?= $news['news_id'] ?></td>
                <td><?= $news['news_title'] ?></td>
                <td><?= $news['dateNews'] ?></td>
                <td><img src="../assets/img/photo-bdd/news/<?= $news["news_picture"] ?>" alt=""></td>
                <td class="description-dashboard"><?= $news['news_content'] ?></td>
                <td><a href="../controllers/controller-admin-article-update.php?idNews=<?= $news['news_id'] ?>"><button class="modify-button">Modifier</button></a></td>
                <td> <a href="#"><button class="delete-button" id="deleteButton" onclick="showModale(this)" data-id="<?= $news['news_id'] ?>">Supprimer</button></a></td>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="tableSmartphone">
    <div class="id">
        <p>ID: <?= $news['news_id'] ?></p>
    </div>
    <div class="mainCard">
        <div class="titlesCard">
            <p>Titre :</p>
            <span><?= $news['news_title'] ?></span>
        </div>
        <div class="titlesCard">
            <p>Date :</p>
            <span><?= $news['dateNews'] ?></span>
        </div>
        <div class="titlesCard">
            <p>Image :</p>
            <span><img src="data:image/png;base64,<?= $news["news_picture"] ?>" alt=""></span>
        </div>
        <div class="titlesCard containerChar">
            <p>Description :</p>
            <span><?= $news['news_content'] ?></span>
        </div>
        <div class="buttons">
            <a href="../controllers/controller-admin-article-update.php"><button class="modify-button">Modifier</button></a>
            <a href="#"><button class="delete-button" id="deleteButton">Supprimer</button></a>
        </div>
    </div>
</div>
</div>
<?php include "components/footer.php" ?>