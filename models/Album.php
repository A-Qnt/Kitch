<?php

class Album
{
    // Nous créons les propriétés de l'objet en fonction des champs de la table kitch-album
    private int $album_id;
    private string $album_title;
    private string $album_release;
    private string $album_description;
    private string $album_cover;


    /**
     * Ajouter un animal dans la base de données
     * @param array $inputs Tableau contenant les données du formulaire
     * @return bool Retourne true si l'animal a bien été ajouté, false si KO
     */

     public static function addAlbum (array $inputs): bool
     {
         try {
             // Creation d'une instance de connexion à la base de données
             $pdo = Database::createInstancePDO();
 
             // requête SQL pour ajouter un animal avec des marqueurs nominatifs
             $sql = 'INSERT INTO `kitch_album` (`album_title`, `album_release`, `album_description`, `album_cover`) VALUES (`:titleAlbum`, `:releaseAlbum`, `:descriptionAlbum`, `:coverAlbum`)';
 
             // On prépare la requête avant de l'exécuter
             $stmt = $pdo->prepare($sql);
 
             // On injecte les valeurs dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
             $stmt->bindValue(':dateTour', Form::safeData($inputs['dateTour']), PDO::PARAM_STR);
             $stmt->bindValue(':country', Form::safeData($inputs['country']), PDO::PARAM_STR);
             $stmt->bindValue(':city', Form::safeData($inputs['city']), PDO::PARAM_STR);
             $stmt->bindValue(':room', Form::safeData($inputs['room']), PDO::PARAM_STR);
             $stmt->bindValue(':picture', $pictureIn64, PDO::PARAM_STR);
             
             // On exécute la requête, elle sera true si elle a réussi, dans le cas contraire il y aura une exception
             return $stmt->execute();
         } catch (PDOException $e) {
             // test unitaire pour vérifier que l'animal n'a pas été ajouté et connaitre la raison
             // echo 'Erreur : ' . $e->getMessage();
             return false;
         }
     }
 




    /**
     * Méthode permettant d'afficher tous les albums de la base de données
     * @return array Tableau associatif contenant les cover des albums
     */
    public static function getAlbum(): array
    {

        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requête dans une variable
            $sql = 'SELECT `album_id`, `album_title`, DATE_FORMAT(`album_release`, "%d/%m/%Y") AS "release", `album_description`, `album_cover` FROM `kitch_album`';

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

    /**
     * Méthode permettant d'afficher tous les albums de la base de données
     * @return array Tableau associatif contenant les infos des animaux
     */
    public static function getAlbumById(): array
    {

        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requête dans une variable
            $sql = 'SELECT `album_title`, DATE_FORMAT(`album_release`, "%d/%m/%Y") AS "release", `album_description`, `album_cover` FROM `kitch_album` WHERE `album_id` = 1';

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


    public static function getTracksByAlbum(int $album_id): array
    {
        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requête dans une variable
            $sql = "SELECT * FROM `kitch_tracks` WHERE `album_id` = $album_id";

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
