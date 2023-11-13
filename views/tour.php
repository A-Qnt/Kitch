<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>
<div class="titleband">
    <h2>Date de tournée</h2>
</div>
<div class="ticket-container">
    <?php foreach (Tour::getTour() as $tour) { ?>
            <div class="ticket">
                <div class="leftSide">
                    <img src="data:image/png;base64,<?= $tour["tour_picture"] ?>" alt="">
                </div>
                <div class="rightSide">
                    <div class="date">
                        <p><?= $tour["date"] ?></p>
                    </div>
                    <div class="groupe">
                        <p>KITCH</p>
                        <span>en concert</span>
                    </div>
                    <div class="lieu">
                        <p><?= $tour["tour_room"] ?></p>
                        <p><?= $tour["tour_city"] ?>, <?= $tour["tour_country"] ?></p>
                    </div>
                </div>
            </div>
    <?php } ?>
</div>
<?php include "components/footer.php" ?>