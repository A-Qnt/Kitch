<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>

<table>
    <tr>
      <th>ID</th>
      <th>Titre</th>
      <th>Date</th>
      <th>Photo</th>
      <th>Description</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Titre 1</td>
      <td>2023-11-01</td>
      <td class="photo"><img src="example.jpg" alt="Photo 1"></td>
      <td>Ceci est une description longue qui sera tronquée s'il dépasse la largeur de la cellule.</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Titre 2</td>
      <td>2023-11-02</td>
      <td class="photo"><img src="example.jpg" alt="Photo 2"></td>
      <td>Ceci est une autre description longue qui sera également tronquée.</td>
    </tr>
  </table>


<?php include "components/footer.php" ?>