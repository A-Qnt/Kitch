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
            $sql = 'SELECT `tour_id`, DATE_FORMAT(`tour_date`, "%d/%m/%Y") AS "date", `tour_city`, `tour_country`, `tour_room`, `tour_picture` FROM `kitch_tour`';

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



    public static function addTour(array $inputs, string $pictureIn64 ): bool
    {
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requête SQL pour ajouter un animal avec des marqueurs nominatifs
            $sql = 'INSERT INTO `kitch_tour` (`tour_date`, `tour_city`, `tour_country`, `tour_room`, `tour_picture`) VALUES (:dateTour, :city, :country, :room, :picture)';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);
            var_dump($inputs);
            var_dump($pictureIn64);

            // On injecte les valeurs dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
            $stmt->bindValue(':dateTour', Form::safeData($inputs['dateTour']), PDO::PARAM_STR);
            $stmt->bindValue(':city', Form::safeData($inputs['city']), PDO::PARAM_STR);
            $stmt->bindValue(':country', Form::safeData($inputs['country']), PDO::PARAM_STR);
            $stmt->bindValue(':room', Form::safeData($inputs['room']), PDO::PARAM_STR);
            $stmt->bindValue(':picture', $pictureIn64, PDO::PARAM_STR);
            
            // On exécute la requête, elle sera true si elle a réussi, dans le cas contraire il y aura une exception
            return $stmt->execute();
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'animal n'a pas été ajouté et connaitre la raison
             echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

}