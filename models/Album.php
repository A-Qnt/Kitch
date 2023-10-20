<?php 

class Album
{
    // Nous créons les propriétés de l'objet en fonction des champs de la table kitch-album
    private int $_id;
    private string $_title;
    private string $_date;
    private string $_description;
    private string $_cover;


     // nous allons utiliser la méthode magique __get pour récupérer les propriétés de l'objet en dehors de la classe
     function __get(string $name)
     {
         return $this->$name;
     }


    /**
     * Permet de rajouter un album dans la base de données
     * @param array $post_form tableau contenant les données du formulaire
     * @param string $userFileIn64 chaine de caractères contenant le fichier uploadé en base64 
     * Permet d'ajouter un album dans la base de données
     * @param array $post_form tableau contenant les données du formulaire
     * @return bool true si l'album' a été ajouté, sinon false
     */

    public static function addAlbum(array $post_form, string $userFileIn64, int $id_employee): bool
    {
        try{
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requête SQL pour ajouter un album avec des marqueurs nominatifs pour faciliter le bindValue
            $sql = 'INSERT INTO `kitch_album` (`album_nom`, `album_date`, `album_description`, `album_cover`)
            VALUES (:title, :date, :description, :cover);'
   
        }






}

}