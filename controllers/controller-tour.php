<?php

require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../models/Tour.php";


//Nous definissons un tableau d'erreur
$errors = [];
// nous definissons une variable permettant de cache / afficher le formulaire
$showForm = true;

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
    if (isset($_POST['picture'])) {
        if (empty($_POST['picture'])) {
            $errors['picture'] = 'Photo obligatoire';
        }
    }

    // si le tableau d'erreur est vide, nous pouvons procéder à l'insertion des données dans la base de données
    if (empty($errors)) {
        // Nous définissons une variable permettant de cacher le formulaire
        $showForm = false;

        // Nous définissons une variable permettant de stocker les données à insérer dans la base de données
        $inputs = [
            'dateTour' => $_POST['dateTour'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'room' => $_POST['room'],
            'picture' => $_POST['picture'],
        ];

        // Nous instancions la classe Tour
        $tour = new Tour();

        // utilisation de la méthode addTour() pour insérer les données dans la base de données
        //si la méthode retourne true, on cache le formulaire et on affiche un message de succès
        if ($tour->addTour($_POST)) {
            $showForm = false;
            $success = 'Le concert a bien été ajouté';
        } else {
            $errors['bdd'] = 'Une erreur est survenue lors de l\'ajout du concert';
        }
    }
}

include "../views/tour.php";