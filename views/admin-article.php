<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>
<div class="addComposantbutton">
    <button>Ajouter un article</button>
</div>
<div class="addArticleForm">
    <form action="traitement.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>
        </div>

        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
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
            <th>DESCRIPTION</th>
            <th></th>
            <th></th>
        </tr>
        <tr class="testtest">
            <td>1</td>
            <td>nouvel album</td>
            <td>20-10-2023</td>
            <td>band-photo.jpg</td>
            <td class="description-dashboard">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, odio asperiores debitis accusantium incidunt nihil voluptate dolorem repellendus dolore soluta blanditiis cum iste quaerat doloremque vero neque, id numquam ullam!</td>
            <td><button class="modify-button">Modifier</button></td>
            <td><button class="delete-button">Supprimer</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Concert a Lyon</td>
            <td>12-09-2023</td>
            <td>photo-concert.jpg</td>
            <td class="description-dashboard">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni dicta magnam quas laborum quam deleniti distinctio cum suscipit, dolorem reiciendis incidunt consectetur cupiditate amet dolores labore iure, provident debitis officiis.</td>
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
            <p>Titre :</p>
            <span>Nouvel album</span>
        </div>
        <div class="titlesCard">
            <p>Date :</p>
            <span>20-10-2023</span>
        </div>
        <div class="titlesCard">
            <p>Image :</p>
            <span>band-photo.jpeg</span>
        </div>
        <div class="titlesCard containerChar">
            <p>Description :</p>
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque obcaecati illum quia ipsa aut. Hic, vero nesciunt a nostrum nam facere omnis dolorum? Quo dolorem, reiciendis modi magni amet harum.</span>
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
            <p>Titre :</p>
            <span>Concert a Lyon</span>
        </div>
        <div class="titlesCard">
            <p>Date :</p>
            <span>12-09-2023</span>
        </div>
        <div class="titlesCard">
            <p>Image :</p>
            <span>photo-concert.jpg</span>
        </div>
        <div class="titlesCard containerChar">
            <p>Description :</p>
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque obcaecati illum quia ipsa aut. Hic, vero nesciunt a nostrum nam facere omnis dolorum? Quo dolorem, reiciendis modi magni amet harum.</span>
        </div>
        <div class="buttons">
            <button class="modify-button">Modifier</button>
            <button class="delete-button">Supprimer</button>
        </div>
    </div>
</div>
<?php include "components/footer.php" ?>