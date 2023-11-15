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
            $sql = 'SELECT `news_id`, `news_title`, DATE_FORMAT(`news_date`, "%d/%m/%Y") AS "dateNews", `news_content`, `news_picture`, `news_link` FROM `kitch_news`';

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

    public static function addNews(array $inputs, string $pictureIn64): bool
    {
        var_dump($inputs);
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requête SQL pour ajouter un animal avec des marqueurs nominatifs
            $sql = 'INSERT INTO `kitch_news` (`news_title`, `news_date`, `news_content`, `news_picture`, `news_link`) VALUES (:titleArticle, :dateArticle, :contentArticle, :pictureArticle, :linkArticle)';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // On injecte les valeurs dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
            $stmt->bindValue(':titleArticle', Form::safeData($inputs['titleArticle']), PDO::PARAM_STR);
            $stmt->bindValue(':dateArticle', Form::safeData($inputs['dateArticle']), PDO::PARAM_STR);
            $stmt->bindValue(':contentArticle', Form::safeData($inputs['contentArticle']), PDO::PARAM_STR);
            $stmt->bindValue(':pictureArticle', $pictureIn64, PDO::PARAM_STR);
            $stmt->bindValue(':linkArticle', Form::safeData($inputs['linkArticle']), PDO::PARAM_STR);

            // On exécute la requête, elle sera true si elle a réussi, dans le cas contraire il y aura une exception
            return $stmt->execute();
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'animal n'a pas été ajouté et connaitre la raison
            //echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }


    public static function getNewsById(int $newsId)
    {
        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requete dans une variable
            $sql = 'SELECT `news_id`, `news_title`, DATE_FORMAT(`news_date`, "%Y-%m-%d") AS "dateNews", `news_content`, `news_picture`, `news_link` FROM `kitch_news` WHERE `news_id` = :idNews';

            // je prepare la requete et je la stock dans une variable (statement)
            $stmt = $pdo->prepare($sql);

            // On injecte la valeur de l'id dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
            $stmt->bindValue(':idNews', Form::safeData($newsId), PDO::PARAM_INT);

            // On exécute la requete
            $stmt->execute();

            // A l'aide d'une ternaire, nous vérifions si nous avons un résultat à l'aide de la méthode rowCount()
            // Si le résultat est différent de 0 nous recuperons les données avec la métode fetch(), sinon nous retournons false 
            $stmt->rowCount() != 0 ? $result = $stmt->fetch(PDO::FETCH_ASSOC) : $result = false;
            return $result;
        } catch (PDOException $e) {
            // test unitaire pour connaitre la raison qui a empêché la récupération de l'article
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }



    public static function updateNews(array $inputs): bool
    {

        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requete SQL pour modifier un article avec des marqueurs nominatifs
            $sql = 'UPDATE `kitch_news` SET `news_title` = :titleArticle, `news_date` = :dateArticle, `news_content` = :contentArticle, `news_link` = :newsLink WHERE `news_id` = :idArticle';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // On injecte les valeurs dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
            $stmt->bindValue(':idArticle', Form::safeData($inputs['idArticle']), PDO::PARAM_INT);
            $stmt->bindValue(':titleArticle', Form::safeData($inputs['titleArticle']), PDO::PARAM_STR);
            $stmt->bindValue(':dateArticle', Form::safeData($inputs['dateArticle']), PDO::PARAM_STR);
            $stmt->bindValue(':contentArticle', Form::safeData($inputs['contentArticle']), PDO::PARAM_STR);
            $stmt->bindValue(':newsLink', Form::safeData($inputs['newsLink']), PDO::PARAM_STR);

            // On exécute la requête, elle sera true si elle a réussi, dans le cas contraire il y aura une exception
            return $stmt->execute();
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'animal n'a pas été ajouté et connaitre la raison
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }


    public static function deleteNews(int $newsId): bool
    {
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requête SQL pour supprimer un article avec des marqueurs nominatifs
            $sql = 'DELETE FROM `kitch_news` WHERE `news_id` = :idArticle';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // On injecte les valeurs dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
            $stmt->bindValue(':idArticle', Form::safeData($newsId), PDO::PARAM_INT);

            // On exécute la requête, elle sera true si elle a réussi, dans le cas contraire il y aura une exception
            return $stmt->execute();
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'animal n'a pas été ajouté et connaitre la raison
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
