<?php

require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Tour.php";

// j'ouvre ma session
session_start();

// si l'utilisateur est déjà connecté, je le redirige vers la page admin
if (!isset($_SESSION['admin'])) {
    header('Location: ../controllers/controller-admin-login.php');
    exit();
}


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
                $errors['picture'] = 'Le fichier est trop volumineux';
            }
        }
    }


// si le tableau d'erreur est vide, nous pouvons ajouter l'album
if (empty($errors)) {
    // Nous indiquons le chemin du répertoire dans lequel les images vont être téléchargés.
    $directory = "../assets/img/photo-bdd/tour/";

    // Nous allons définir $new_name qui aura un nom d'image unique avec : la fonction uniqid() et une extension '.webp'
    $new_name = uniqid() . '.webp';

    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $directory . $new_name)) {
        // nous ajoutons l'article et nous récupérons l'id de l'article
        $article_id = Tour::addTour($_POST, $new_name);

        // nous redirigeons vers la page d'accueil
        header('Location: controller-admin-tour.php');
    } else {
        $errors['addTour'] = 'Erreur lors de l\'ajout du concert';
    }
} else {
    $uploadMessage = 'Erreur lors de l\'upload de votre fichier';
}






    // si le tableau d'erreurs est vide, on ajoute la date de concert
    // if (empty($errors)) {
    //     // nous récupérons le contenu du fichier image
    //     $pictureIn64 = file_get_contents($_FILES['picture']['tmp_name']);
    //     // nous encodons le contenu du fichier image en base64
    //     $pictureIn64 = base64_encode($pictureIn64);
    //     // nous ajoutons la date de concert
    //     if (Tour::addTour($_POST, $pictureIn64)) {
    //         header('Location: controller-admin-tour.php');
    //     } else {
    //         $errors['bdd'] = 'Erreur lors de l\'ajout de la date de concert';
    //     }
    // }
}

include "../views/admin-tour.php";
