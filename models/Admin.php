<?php

class Admin 
{
    // nous allons créer les propriétés de l'objet en fonction des champs de la table kitch_admin  
    private int $admin_id;
    private string $admin_ident;
    private string $admin_password;

    // nous allons utiliser la méthode magique __get pour récupérer les propriétés de l'objet en dehors de la classe
    function __get(string $name)
    {
        return $this->$name;
    }

    // méthode pour vérifier si l'identifiant et le mot de passe sont corrects
    public static function checkAdmin(string $ident, string $password): bool
    {
        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requête dans une variable
            $sql = 'SELECT `login_id`, `login_user`, `login_password` FROM `kitch_login` WHERE `login_user` = :ident';

            // J'effectue la requete et je la stock dans une variable (statement)
            $stmt = $pdo->prepare($sql);

            // On injecte les valeurs dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
            $stmt->bindValue(':ident', Form::safeData($ident), PDO::PARAM_STR);

            // Pour récupérer les données, j'utilise la méthode fetch() car nous avons un seul résultat
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // nous vérifions si le résultat est vide
            if (empty($result)) {
                return false;
            }

            // nous vérifions si le mot de passe est correct
            if (!password_verify($password, $result['login_password'])) {
                return false;
            }

            // nous retournons true si tout est ok
            return true;
        } catch (PDOException $e) {
            // test unitaire pour connaitre la raison qui a empêché la récupération des animaux
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}