<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>
<div class="announcement">
    <img src="../assets/img/photo-album/covernewstrifeland.jpg" alt="Couverture de l'album">
    <div class="announcement-content">
        <h3>Nouvel Album Disponible</h2>
            <p>Écoutez notre dernier album intitulé "New Strife lands"</p>
            <a href="https://open.spotify.com/intl-fr/album/6MYTITORR44QTxG6N6hfkp" class="btnspotify">Écouter sur Spotify</a>
    </div>
    <div class="contactUs">
        <h3>Vous voulez du KITCH chez vous ?</h3>
        <p>N"hesitez pas à nous contacter <a href="../controllers/controller-contact.php">ici</a></p>
    </div>
</div>
<div class="iframe">
<iframe width="100%" height="100%" src="https://www.youtube.com/embed/32gVpPbO_4c?si=fwRWbi1kvseoDccP&amp;controls=0&amp;start=4??autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
<div class="titleband">
    <h2>Actualités</h2>
</div>
<div class="cards">
    <?php foreach (News::getNews() as $news) {  ?>
        <a href="<?= $news["news_link"] ?>">
            <div class="card">
                <img src="../assets/img/photo-bdd/news/<?= $news["news_picture"] ?>" alt="image des news" class="card-image">
                <h2 class="card-title"><?= $news["news_title"] ?></h2>
                <p class="card-description"><?= $news["news_content"] ?></p>
                <p class="card-date"><?= $news["dateNews"] ?></p>
            </div>
        </a>
    <?php } ?>

</div>

<?php include "components/footer.php" ?>