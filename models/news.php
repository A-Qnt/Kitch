<?php

class News 
{

// Nous créons les propriétés de l'objet en fonction des champs de la table kitch-album
private int $news_id;
private string $news_date;
private string $news_title;
private string $news_content;
private string $news_link;
private string $news_picture;


 /**
     * Méthode permettant d'afficher tous les albums de la base de données
     * @return array Tableau associatif contenant les infos des dates de concert
     */
    public static function getNews(): array
    {

        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requête dans une variable
            $sql = 'SELECT `news_title`, DATE_FORMAT(`news_date`, "%d/%m/%Y") AS "dateNews", `news_content`, `news_picture`, `news_link` FROM `kitch_news`';

            // J'effectue la requete et je la stock dans une variable (statement)
            $stmt = $pdo->query($sql);

            // Pour récupérer les données, j'utilise la méthode fetchAll() car nous avons plusieurs résultats
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            // test unitaire pour connaitre la raison qui a empêché la récupération des animaux
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

}