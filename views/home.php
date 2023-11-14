<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>
<div class="announcement">
    <img src="../assets/img/photo-album/covernewstrifeland.jpg" alt="Couverture de l'album">
    <div class="announcement-content">
        <h3>Nouvel Album Disponible</h2>
            <p>Écoutez notre dernier album intitulé "New Strife lands"</p>
            <a href="https://open.spotify.com/intl-fr/album/6MYTITORR44QTxG6N6hfkp" class="btnspotify">Écouter sur Spotify</a>
    </div>
</div>
<div class="titleband">
    <h2>Actualités</h2>
</div>
<div class="cards">
    <?php foreach (News::getNews() as $news) {  ?>
        <a href="<?= $news["news_link"] ?>">
            <div class="card">
                <img src="data:image/png;base64,<?= $news["news_picture"] ?>" alt="Image News" class="card-image">
                <h2 class="card-title"><?= $news["news_title"] ?></h2>
                <p class="card-description"><?= $news["news_content"] ?></p>
                <p class="card-date"><?= $news["dateNews"] ?></p>
            </div>
        </a>
    <?php } ?>
    
</div>

<?php include "components/footer.php" ?>