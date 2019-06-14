<?php


function featured_films(){
    include('database.php');
    try {

        $result = $db->prepare('SELECT * FROM film ORDER BY RAND() LIMIT 4');
        $result->execute();
       return $films = $result->fetchAll(PDO::FETCH_ASSOC);
        
        } catch(Exception $e){
        echo $e->getMessage();
    }
}

function find_film($id){
    include('database.php');
    try {
        $query = "SELECT * FROM film WHERE film_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
       return $film = $stmt->fetch();
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

    /**
     * finds actors associated with a movie based on the movie id
     * using a subquery
     */
    function find_actors_by_movie_id($movie_id)
    {
        include('database.php');
        try{
            $query = "SELECT first_name, last_name FROM actor WHERE actor_id IN 
            (SELECT actor_id FROM film_actor WHERE film_id = :film_id)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':film_id', $movie_id, PDO::PARAM_INT);
            $stmt->execute();
            $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $films;
           
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function find_movie_lang_by_film_id($movie_id)
    {
        include('database.php');
        try{
            $query = "SELECT name FROM language WHERE language_id IN
             (SELECT language_id FROM film WHERE film_id = :film_id)";
             $stmt = $db->prepare($query);
             $stmt->bindParam(':film_id', $movie_id, PDO::PARAM_INT);
             $stmt->execute();
             $result = $stmt->fetch();
             return $result;
        }catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
