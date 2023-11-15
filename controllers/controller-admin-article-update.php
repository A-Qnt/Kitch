<?php

require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/News.php";

// Nous définissons un tableau d'erreurs
$errors = [];

// Nous vérifions que l'id est bien présent dans l'url et qu'il n'est pas vide
if (isset($_GET['idNews']) && !empty($_GET['idNews'])) {
    // Nous vérifions également que l'id est bien un nombre entier à l'aide de la fonction prédéfinie ctype_digit().
    // si ce n'est pas le cas nous redidiectons l'utilisateur sur la page admin-article.php
    if (!ctype_digit($_GET['idNews'])) {
        header('Location: ../controllers/controller-admin-article.php');
        exit();
    } else {
        // Si c'est le cas nous créons une variable $idNews qui contiendra l'id de l'article
        $idNews = $_GET['idNews'];
        // Nous allons également appeler la méthode getNewsById() pour récupérer les informations de l'article
        $news = new News();
        $newsDetails = $news->getNewsById($idNews);
        var_dump($newsDetails);
        // Nous vérifions que l'article existe
        if ($newsDetails === false) {
            header('Location: ../controllers/controller-admin-article.php');
            exit();
        }

    }
} else {
    header('Location: ../controllers/controller-admin-article.php');
    exit();
}

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
        //instanciation de la classe News
        $news = new News();
        // utilisation de la méthode updateNews() pour modifier l'article
        if ($news->updateNews($_POST)) {
            // si la modification a réussi, nous redirigeons l'utilisateur sur la page admin-article.php
            header('Location: ../controllers/controller-admin-article.php');
            exit();
        } else {
            // sinon nous affichons un message d'erreur
            $errors['update'] = 'Erreur lors de la modification';
        }
    }
}


include "../views/admin-article-update.php";