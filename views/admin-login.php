<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>
<div class="titleband">
    <h2>Connectez-vous</h2>
</div>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="ident">Identifiant :</label>
            <input type="text" id="ident" name="ident">
            <span class="error"><?php if (isset($errors['ident'])) echo $errors['ident']; ?></span>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password">
            <span class="error"><?php if (isset($errors['password'])) echo $errors['password']; ?></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btnret">Connexion</button>
        </div>
    </form>
</div>

<?php include "components/footer.php" ?>