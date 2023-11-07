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

    //  public function addAlbum (array $inputs): bool 
    //  {
    // try {
    //Creation d'une instance de connexion à la base de données
    // $pdo = Database::createInstancePDO();

    // requete SQL pour ajouter un album en utilisant des marqueurs nominatifs
    // $sql = ''
    // } catch (\Throwable $th) {
    //throw $th;
    // }
    //  }




    /**
     * Méthode permettant d'afficher tous les albums de la base de données
     * @return array Tableau associatif contenant les infos des animaux
     */
    public static function getAlbum(): array
    {

        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requête dans une variable
            $sql = 'SELECT `album_title`, DATE_FORMAT(`album_release`, "%d/%m/%Y") AS "release", `album_description`, `album_cover`, `track_number`, `track_title` FROM `kitch_album` NATURAL JOIN `kitch_tracks` order by `track_number`';

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
