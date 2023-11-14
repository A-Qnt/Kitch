<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>

<div class="album-container"><!--div qui contient les bandeaux-->
    <div class="albums">
        <?php foreach (Album::getAlbum() as $album) { ?>
            <img src="../assets/img/photo-bdd/album/<?= $album['album_cover'] ?>" alt="Image News" data-type="album" data-album="album-<?= $album["album_id"] ?>">
        <?php } ?>
    </div>

    <?php foreach (Album::getAlbum() as $album) { ?>
        <div data-details="album-<?= $album["album_id"] ?>" class="bandeau"> <!--div d'un bandeau complet-->
            <div class="left-bandeau"> <!--div gauche qui contient l'image de l'album-->
                <img src="../assets/img/photo-bdd/album/<?= $album['album_cover'] ?>">
            </div>
            <div class="mid-bandeau"> <!--div droite qui contient le titre et les tracks de l'album-->
                <div class="album-title"><!--div qui contient le titre-->
                    <h2><?= $album["album_title"] ?></h2>
                    <h3><?= $album["release"] ?></h3>
                    <h4>Titres:</h4>
                </div>
                <div class="tracks"><!--div qui contient les tracks de gauche et de droite-->
                    <div class="tracks-left"> <!--div qui contient les tracks a gauche-->
                        <ol>
                            <?php foreach (Album::getTracksByAlbum($album["album_id"]) as $track) { ?>
                                <li><?= $track["track_title"] ?></li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="right-bandeau">
                <h3>En deux mots:</h3>
                <p><?= $album["album_description"]  ?></p>
            </div>
        </div>
    <?php } ?>
</div>

<?php include "components/footer.php" ?>