<?php

class Tour 
{

// Nous créons les propriétés de l'objet en fonction des champs de la table kitch-album
private int $tour_id;
private string $tour_date;
private string $tour_city;
private string $tour_country;
private string $tour_room;
private string $tour_picture;


 /**
     * Méthode permettant d'afficher tous les albums de la base de données
     * @return array Tableau associatif contenant les infos des dates de concert
     */
    public static function getTour(): array
    {

        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requête dans une variable
            $sql = 'SELECT DATE_FORMAT(`tour_date`, "%d/%m/%Y") AS "date", `tour_city`, `tour_country`, `tour_room`, `tour_picture` FROM `kitch_tour`';

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