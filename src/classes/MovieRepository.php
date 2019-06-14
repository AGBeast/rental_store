<?php


class MovieRepository implements MovieRepositoryInterface
{
    protected $dataStore;

    public function __construct(PDO $db)
    {
        $this->dataStore = $db;

    }

    public function findAll()
    {
        $query = "SELECT * FROM film";
        try{
            $stmt = $this->dataStore->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch(PDOException $e){
            echo "The following error occured ". $e->getMessage();
        }
    }

    public function findById($id)
    {
        $query = "SELECT * FROM film WHERE film_id = :id";
        try{
            $stmt = $this->dataStore->prepare($query);
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch(PDOException $e){
            echo "The following error occurred: ". $e->getMessage();
        }
    }

    public function findByCategory($category_name)
    {
        $query = "SELECT film.film_id, title, release_year, rating, rental_rate FROM film JOIN film_category ON film.film_id = film_category.film_id WHERE film_category.category_id IN (SELECT category_id FROM category WHERE name = :name);";

        try{
            $stmt = $this->dataStore->prepare($query);
            $stmt->bindParam(':name', $category_name, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;

        } catch(PDOException $e){
            echo "The following error has occured ".$e->getMessage();
        }
    }

    public function findAMoviesByActorName($actor_name)
    {
        
    }

    public function search($title)
    {
        $title = $title."%";

        $query = "SELECT title, description FROM film  WHERE title LIKE :title LIMIT 6";
        try{
            $stmt = $this->dataStore->prepare($query);
            $stmt->bindParam(':title',$title, PDO::PARAM_STR);
            $stmt->execute();
            $titles = $stmt->fetchAll();
            return $titles;
        }catch(PDOException $e){
          echo "Ran into the following error: ". $e->getMessage();
        }

    }
    public function actorsByMovieId($movie_id)
    {
        
        try{
            $query = "SELECT first_name, last_name FROM actor WHERE actor_id IN 
            (SELECT actor_id FROM film_actor WHERE film_id = :film_id)";
            $stmt = $this->dataStore->prepare($query);
            $stmt->bindParam(':film_id', $movie_id, PDO::PARAM_INT);
            $stmt->execute();
            $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $films;
           
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function findMovieLanguage($film_id)
    {
        $query = "SELECT name FROM language WHERE language_id IN (SELECT language_id FROM film WHERE film_id = :id)";
        try{
            $stmt = $this->dataStore->prepare($query);
            $stmt->bindParam(':id', $film_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['name'];
        }catch(PDOException $e){
            echo "The following error has occured ". $e->getMessage();
        }
    }

    public function movieCategories()
    {
        $query = "SELECT name FROM category";
        try{
            $stmt = $this->dataStore->prepare($query);
            $stmt->execute();
            $categories = $stmt->fetchAll();
            return $categories;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function retrieveRandomMovies($number)
    {
        $query = "SELECT * FROM film ORDER BY RAND() LIMIT :number";
        try{
            $stmt = $this->dataStore->prepare($query);
            $stmt->bindParam(':number', $number, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
           }catch(PDOException $e){
               echo "The following error occured ". $e->getMessage();
           }
        
    }


}