<?php include "components/head.php" ?>
<?php include "components/navbar-admin.php" ?>

  <style>
    table {
      border-collapse: collapse;
    }
    
    table, th, td {
      border: 1px solid black;
    }

    td {
      width: 100px; /* Largeur de la cellule de tableau */
      overflow: hidden; /* Cacher le surplus de texte */
      white-space: nowrap; /* Empêcher le texte de se retourner à la ligne */
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <td>Ceci est un texte long qui sera tronqué s'il dépasse la largeur de la cellule.eci est un texte long qui sera tronqué s'il dépasse la largeur de la cellule.eci est un texte long qui sera tronqué s'il dépasse la largeur de la cellule.eci est un texte long qui sera tronqué s'il dépasse la largeur de la cellule.</td>
      <td>Ceci est un autre texte</td>
    </tr>
  </table>
</body>
</html>

<?php include "components/footer.php" ?>