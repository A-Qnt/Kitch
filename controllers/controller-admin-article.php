<?php

require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/News.php";

//Nous definissons un tableau d'erreur
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //controle du titre : si vide
    if (isset($_POST['titleArticle'])) {
        if (empty($_POST['titleArticle'])) {
            $errors['titleArticle'] = 'Titre obligatoire';
        }
    }

    //controle de la date : si vide
    if (isset($_POST['dateArticle'])) {
        if (empty($_POST['dateArticle'])) {
            $errors['dateArticle'] = 'Date obligatoire';
        }
    }

    //controle de la photo : si vide
    if (isset($_FILES['pictureArticle'])) {
        //si le code d'erreur est égal à 4, cela signifie que l'utilisateur n'a pas téléchargé de fichier
        if ($_FILES['pictureArticle']['error'] == 4) {
            $errors['pictureArticle'] = 'Photo obligatoire';
        } else {
            //nous récupérons le type du fichier avec son type mime et son extension : ex. image/png
            $mimeUserFile = mime_content_type($_FILES["pictureArticle"]["tmp_name"]);

            // nous utilisons la fonction explode() pour séparer le type mime et l'extension
            $type = explode('/', $mimeUserFile)[0];
            $extension = explode('/', $mimeUserFile)[1];
            // nous vérifions que le fichier est bien une image
            if ($type != 'image') {
                $errors['pictureArticle'] = 'Le fichier doit être une image';
                // nous vérifions que l'extension est bien une extension autorisée
            } elseif (!in_array($extension, UPLOAD_EXTENSIONS)) {
                $errors['pictureArticle'] = 'L\'image doit être de type jpg, jpeg, png, gif ou webp';
                // nous vérifions que la taille du fichier ne dépasse pas la taille maximale autorisée
            } elseif ($_FILES['pictureArticle']['size'] > UPLOAD_MAX_SIZE) {
                $errors['pictureArticle'] = 'Le fichier est trop volumineux';
            }
        }
    }

    //controle du contenu : si vide
    if (isset($_POST['contentArticle'])) {
        if (empty($_POST['contentArticle'])) {
            $errors['contentArticle'] = 'Contenu obligatoire';
        }
    }

    // si le tableau d'erreur est vide, nous pouvons ajouter l'article
    if (empty($errors)) {
        // nous récupérons le contenu du fichier image
        $picture = file_get_contents($_FILES['pictureArticle']['tmp_name']);
        // nous encodons le contenu du fichier image en base64
        $pictureIn64 = base64_encode($picture);
        // nous ajoutons la date de l'article
        if (News::addNews($_POST, $pictureIn64)) {
            header('Location: controller-admin-article.php');
        } else {
            $errors['bdd'] = 'Erreur lors de l\'ajout de l\'article';
        }
    }
}

include "../views/admin-article.php";
