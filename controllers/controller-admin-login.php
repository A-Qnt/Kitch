<?php
// j'ouvre ma session
session_start();



require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/Admin.php";



// je créé un tableau d'erreur
$errors = [];

// Je vérifie si la méthode de la requête est bien POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // je vérifie si l'identifiant est vide
    if (isset($_POST['ident'])) {
        if (empty($_POST['ident'])) {
            $errors['ident'] = 'Identifiant obligatoire';
        }
    }

    // je vérifie si le mot de passe est vide
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'Mot de passe obligatoire';
        }
    }

    // si le tableau d'erreur est vide, je peux vérifier si l'identifiant et le mot de passe sont corrects
    if (empty($errors)) {
        // je vérifie si l'identifiant et le mot de passe sont corrects
        if (Admin::checkAdmin($_POST['ident'], $_POST['password'])) {
            // si c'est le cas, je créé une session admin
            $_SESSION['admin'] = $_POST['ident'];
            // je redirige l'utilisateur vers la page admin
            header('Location: ../controllers/controller-admin.php');
            exit();
        } else {
            // si l'identifiant et le mot de passe ne sont pas corrects, j'ajoute un message d'erreur
            $errors['ident'] = 'Identifiant ou mot de passe incorrect';
        }
    }
}


include "../views/admin-login.php";
