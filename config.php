<?php
// Définition des constantes de connexion à la base de données : mdp, login, nom de la base, host ...
define('DB_HOST', 'localhost');
define('DB_NAME', 'kitch');
define('DB_USER', 'root');
define('DB_PASS', '');

// Définition des regex sous forme de constante
define('REGEX_NAME', '/^[a-zA-ZÀ-ÖØ-öø-ÿ\' -]+$/');
define('REGEX_PHONENUMBER', '/^[01|02|03|04|05|06|07|09]\d{9}$/');

// Définition des paramètres d'upload de fichiers
define('UPLOAD_MAX_SIZE', 8 * 1000 * 1000);
define('UPLOAD_EXTENSIONS', ['jpg', 'jpeg', 'png', 'svg', 'gif', 'webp']);