<?php 

require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Tour.php";


//Nous definissons un tableau d'erreur
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // controle de la date : si vide
    if (isset($_POST['dateTour'])) {
        if (empty($_POST['dateTour'])) {
            $errors['dateTour'] = 'Date obligatoire';
        }
    }

    //controle du pays : si vide
    if (isset($_POST['country'])) {
        if (empty($_POST['country'])) {
            $errors['country'] = 'Pays obligatoire';
        }
    }

    //controle de la ville : si vide
    if (isset($_POST['city'])) {
        if (empty($_POST['city'])) {
            $errors['city'] = 'Ville obligatoire';
        }
    }

    //controle de la salle : si vide
    if (isset($_POST['room'])) {
        if (empty($_POST['room'])) {
            $errors['room'] = 'Salle obligatoire';
        }
    }

    //controle de la photo : si vide
    if (isset($_FILES['picture'])) {
       // si le code d'erreur est égal à 4, cela signifie que l'utilisateur n'a pas téléchargé de fichier
         if ($_FILES['picture']['error'] == 4) {
          $errors['picture'] = 'Photo obligatoire';
    } else {
        // nous récupérons le type du fichier avec son type mime et son extension : ex. image/png
        $mimeUserFile = mime_content_type($_FILES["picture"]["tmp_name"]);

        // nous utilisons la fonction explode() pour séparer le type mime et l'extension
        $type = explode('/', $mimeUserFile)[0];
        $extension = explode('/', $mimeUserFile)[1];
        //nous vérifions que le fichier est bien une image
        if ($type != 'image') {
            $errors['picture'] = 'Le fichier doit être une image';
            // nous vérifions que l'extension est bien une extension autorisée
        } elseif (!in_array($extension, UPLOAD_EXTENSIONS)) {
            $errors['picture'] = 'L\'image doit être de type jpg, jpeg, png, gif ou webp';
            // nous vérifions que la taille du fichier ne dépasse pas la taille maximale autorisée
        } elseif ($_FILES['picture']['size'] > UPLOAD_MAX_SIZE) {
            $errors['picture'] = 'Le fichier ne doit pas dépasser ' . UPLOAD_MAX_SIZE / 1000 . 'Ko';
        }
    }   
    } 

    // si le tableau d'erreur est vide, nous pouvons procéder à l'insertion des données dans la base de données
    if (empty($errors)) {
       
        // Nous allons convertir le fichier en base64 pour le stocker dans la base de données
        // nous récupérons le contenu du fichier
        $picture = file_get_contents($_FILES['picture']['tmp_name']);

        // nous convertissons le contenu du fichier en base64
        $pictureIn64 = base64_encode($picture);

        if (Tour::addTour($_POST, $pictureIn64)) {
            $success = 'Le concert a bien été ajouté';
        } else {
            $errors['bdd'] = 'Une erreur est survenue lors de l\'ajout du concert';
        }
    }
    

}

include "../views/admin-tour.php";
