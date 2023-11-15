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


    // si le tableau d'erreur est vide, nous pouvons ajouter l'album
    if (empty($errors)) {
        // Nous indiquons le chemin du répertoire dans lequel les images vont être téléchargés.
        $directory = "../assets/img/photo-bdd/news/";

        // Nous allons définir $new_name qui aura un nom d'image unique avec : la fonction uniqid() et une extension '.webp'
        $new_name = uniqid() . '.webp';

        if (move_uploaded_file($_FILES["pictureArticle"]["tmp_name"], $directory . $new_name)) {
            // nous ajoutons l'article et nous récupérons l'id de l'article
            $article_id = News::addNews($_POST, $new_name);

            // nous redirigeons vers la page d'accueil
            header('Location: controller-admin-article.php');
        } else {
            $errors['addTheAlbum'] = 'Erreur lors de l\'ajout de l\'article';
        }
    } else {
        $uploadMessage = 'Erreur lors de l\'upload de votre fichier';
    }
}




include "../views/admin-article.php";
