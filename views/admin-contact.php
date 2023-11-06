<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>
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
        <tr>
            <td>1</td>
            <td>nouvel album</td>
            <td>20-10-2023</td>
            <td>band-photo.jpg</td>
            <td id="maxchar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, odio asperiores debitis accusantium incidunt nihil voluptate dolorem repellendus dolore soluta blanditiis cum iste quaerat doloremque vero neque, id numquam ullam!</td>
            <td><button class="modify-button">Modifier</button></td>
            <td><button class="delete-button">Supprimer</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Concert a Lyon</td>
            <td>12-09-2023</td>
            <td>photo-concert.jpg</td>
            <td id="maxchar2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni dicta magnam quas laborum quam deleniti distinctio cum suscipit, dolorem reiciendis incidunt consectetur cupiditate amet dolores labore iure, provident debitis officiis.</td>
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
        <div class="titleCard">
            <p>Titre :</p>
            <span>Nouvel album</span>
        </div>
        <div class="dateCard">
            <p>Date :</p>
            <span>20-10-2023</span>
        </div>
        <div class="photoCard">
            <p>Image :</p>
            <span>band-photo.jpeg</span>
        </div>
        <div class="descriptionCard" id="containerChar">
            <p>Description :</p>
            <span id="maxchar3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque obcaecati illum quia ipsa aut. Hic, vero nesciunt a nostrum nam facere omnis dolorum? Quo dolorem, reiciendis modi magni amet harum.</span>
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
        <div class="titleCard">
            <p>Titre :</p>
            <span>Concert a Lyon</span>
        </div>
        <div class="dateCard">
            <p>Date :</p>
            <span>12-09-2023</span>
        </div>
        <div class="photoCard">
            <p>Image :</p>
            <span>photo-concert.jpg</span>
        </div>
        <div class="descriptionCard" id="containerChar">
            <p>Description :</p>
            <span id="maxchar3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque obcaecati illum quia ipsa aut. Hic, vero nesciunt a nostrum nam facere omnis dolorum? Quo dolorem, reiciendis modi magni amet harum.</span>
        </div>
        <div class="buttons">
            <button class="modify-button">Modifier</button>
            <button class="modify-button">Supprimer</button>
        </div>
    </div>
</div>

<?php include "components/footer.php" ?>