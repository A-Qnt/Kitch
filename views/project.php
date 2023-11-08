<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>

<div class="album-container"><!--div qui contient les bandeaux-->
    <div class="albums">
        <?php foreach (Album::getAlbum() as $album) { ?>
            <img src="../assets/img/photo-album/<?= $album["album_cover"] ?>" alt="Image News" data-type="album" data-album="album-<?= $album["album_id"] ?>">
        <?php } ?>
    </div>

    <?php foreach (Album::getAlbum() as $album) { ?>
        <div data-details="album-<?= $album["album_id"] ?>" class="bandeau"> <!--div d'un bandeau complet-->
            <div class="left-bandeau"> <!--div gauche qui contient l'image de l'album-->
                <img src="../assets/img/photo-album/<?= $album["album_cover"] ?>" alt="Image News">
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
                    <!-- <div class="tracks-right">div qui contient les tracks a droite -->
                    <!-- <ul>
                            <li>Buffet</li>
                            <li>Colors</li>
                            <li>Juice</li>
                            <li>Transport</li>
                            <li>Updown</li>
                            <li>Echanges</li>
                            <li>Bettty Boop</li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="right-bandeau">
                <h3>En deux mots:</h3>
                <p><?= $album["album_description"]  ?></p>
            </div>
        </div>
    <?php } ?>

    <div id="info2" class="bandeau"> <!--div d'un bandeau complet-->
        <div class="left-bandeau"> <!--div gauche qui contient l'image de l'album-->
            <img src="../assets/img/photo-album/covercalame.jpeg" alt="Image News">
        </div>
        <div class="mid-bandeau"> <!--div droite qui contient le titre et les tracks de l'album-->
            <div class="album-title"><!--div qui contient le titre-->
                <h2>CALAME</h2>
                <h3>07 Mar 2020</h3>
                <h4>Titres:</h4>
            </div>
            <div class="tracks"><!--div qui contient les tracks de gauche et de droite-->
                <div class="tracks-left"> <!--div qui contient les tracks a gauche-->
                    <ul>
                        <li>Raggedman</li>
                        <li>Oiseau</li>
                        <li>Night Tripper</li>
                        <li>Hell Leefan</li>
                        <li>Fall</li>
                        <li>Londres</li>
                        <li>Forest</li>
                    </ul>
                </div>
                <div class="tracks-right"><!--div qui contient les tracks a droite-->
                    <ul>
                        <li>Buffet</li>
                        <li>Colors</li>
                        <li>Juice</li>
                        <li>Transport</li>
                        <li>Updown</li>
                        <li>Echanges</li>
                        <li>Bettty Boop</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right-bandeau">
            <h3>En deux mots:</h3>
            <p>Dans “Calame”, leur nouvel album, Kitch nous propose un voyage dans un monde alternatif qui s’étire du post-rock au trip-hop. Sans vraiment passer par la musique pop. </p>
        </div>
    </div>
    <div id="info3" class="bandeau"> <!--div d'un bandeau complet-->
        <div class="left-bandeau"> <!--div gauche qui contient l'image de l'album-->
            <img src="../assets/img/photo-album/covernewstrifeland.jpg" alt="Image News">
        </div>
        <div class="mid-bandeau"> <!--div droite qui contient le titre et les tracks de l'album-->
            <div class="album-title"><!--div qui contient le titre-->
                <h2>NEWS STRIFE LANDS</h2>
                <h3>06 Mai 2022</h3>
                <h4>Titres:</h4>
            </div>
            <div class="tracks"><!--div qui contient les tracks de gauche et de droite-->
                <div class="tracks-left"> <!--div qui contient les tracks a gauche-->
                    <ul>
                        <li>Raggedman</li>
                        <li>Oiseau</li>
                        <li>Night Tripper</li>
                        <li>Hell Leefan</li>
                        <li>Fall</li>
                        <li>Londres</li>
                        <li>Forest</li>
                    </ul>
                </div>
                <div class="tracks-right"><!--div qui contient les tracks a droite-->
                    <ul>
                        <li>Buffet</li>
                        <li>Colors</li>
                        <li>Juice</li>
                        <li>Transport</li>
                        <li>Updown</li>
                        <li>Echanges</li>
                        <li>Bettty Boop</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right-bandeau">
            <h3>En deux mots:</h3>
            <p>New Strife Lands, est composé avec une envie de parler de sujets plus profonds, touchant aux angoisses, à l’épanouissement, à l’existence, au conflit… En somme, toutes ces turbulences positives ou négatives qui nous construisent. Un album instinctif, viscéral qui nous transporte dans des jeux de respirations et de nuances fébriles, d’envolées et d’échappées, jusqu’au moment où sans le comprendre, une véritable violence se hisse pour redescendre à l’image d’une tempête.</p>
        </div>
    </div>
</div>

<?php include "components/footer.php" ?>