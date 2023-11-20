<?php
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Album.php";

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
    //controle du titre : si vide
    if (isset($_POST['titleAlbum'])) {
        if (empty($_POST['titleAlbum'])) {
            $errors['titleAlbum'] = 'Titre obligatoire';
        }
    }

    //controle de la date : si vide
    if (isset($_POST['releaseAlbum'])) {
        if (empty($_POST['releaseAlbum'])) {
            $errors['releaseAlbum'] = 'Date obligatoire';
        }
    }

    //controle de la description : si vide
    if (isset($_POST['descriptionAlbum'])) {
        if (empty($_POST['descriptionAlbum'])) {
            $errors['descriptionAlbum'] = 'Description obligatoire';
        }
    }

    //controle des tracks : si vide 
    if (count($_POST) == 3 ) {
        $errors['tracks'] = 'Ajout d\'une piste minimum obligatoire';
    }

    // controle de la photo : si vide
    if (isset($_FILES['coverAlbum'])) {
        //si le code d'erreur est égal à 4, cela signifie que l'utilisateur n'a pas téléchargé de fichier
        if ($_FILES['coverAlbum']['error'] == 4) {
            $errors['coverAlbum'] = 'Photo obligatoire';
        } else {
            //nous récupérons le type du fichier avec son type mime et son extension : ex. image/png
            $mimeUserFile = mime_content_type($_FILES["coverAlbum"]["tmp_name"]);

            // nous utilisons la fonction explode() pour séparer le type mime et l'extension
            $type = explode('/', $mimeUserFile)[0];
            $extension = explode('/', $mimeUserFile)[1];
            // nous vérifions que le fichier est bien une image
            if ($type != 'image') {
                $errors['coverAlbum'] = 'Le fichier doit être une image';
                // nous vérifions que l'extension est bien une extension autorisée
            } elseif (!in_array($extension, UPLOAD_EXTENSIONS)) {
                $errors['coverAlbum'] = 'L\'image doit être de type jpg, jpeg, png, gif ou webp';
                // nous vérifions que la taille du fichier ne dépasse pas la taille maximale autorisée
            } elseif ($_FILES['coverAlbum']['size'] > UPLOAD_MAX_SIZE) {
                $errors['coverAlbum'] = 'Le fichier est trop volumineux';
            }
        }
    }

    // si le tableau d'erreur est vide, nous pouvons ajouter l'album
    if (empty($errors)) {
        // Nous indiquons le chemin du répertoire dans lequel les images vont être téléchargés.
        $directory = "../assets/img/photo-bdd/album/";

        // Nous allons définir $new_name qui aura un nom d'image unique avec : la fonction uniqid() et une extension '.webp'
        $new_name = uniqid() . '.webp';

        if (move_uploaded_file($_FILES["coverAlbum"]["tmp_name"], $directory . $new_name)) {
            // nous ajoutons l'album et nous récupérons son id pour l'ajouter aux tracks
            $album_id = Album::addAlbum($_POST, $new_name);

            if ($album_id > 0) {

                foreach ($_POST as $key => $value) {
                    if (preg_match('#track#', $key)) {
                        $track = $value;
                        Album::addTrack($track, $album_id);
                    }
                }

                // nous redirigeons vers la page d'accueil
                header('Location: controller-admin-album.php');
            } else {
                $errors['addTheAlbum'] = 'Erreur lors de l\'ajout de l\'album';
            }
        } else {
            $uploadMessage = 'Erreur lors de l\'upload de votre fichier';
        }
        var_dump($uploadMessage);
    }
}





include "../views/admin-album.php";
