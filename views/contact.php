<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>
<div class="titleband">
    <h2>Contactez-nous</h2>
</div>
<div class="container">
    <form action="traitement_formulaire.php" method="post">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Envoyer</button>
        </div>
    </form>
</div>

<?php include "components/footer.php" ?>