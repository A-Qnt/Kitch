<?php

require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../helpers/Form.php";
require_once "../models/News.php";

// controle pour delete un article si $_POST est present
if (isset($_POST['newsToDelete'])) {
    News::deleteNews($_POST['newsToDelete']);
    header('Location: ../controllers/controller-admin-article.php');
    exit();
}
