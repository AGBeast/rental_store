<?php
require_once('src/config.php');

$film_id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$film = $movieService->findById($film_id);
$actors = $movieService->actorsByMovieId($film_id);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Movie - <?php echo $film['title'] ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/styles/styles.css">
    </head>
    <body class="container">
    <?php include('navigation.php')  ?>
    <body>
    <div class="container justify-content-md-center">
        <a href="index.php"><< Return Home </a>
        <h2>Movie Title: <?php echo $film['title']  ?></h2> 
        <h3>Year Released:</h3>
        <p><?php echo $film['release_year']  ?></p>
    </div>
    <div class="container justify-content-md-center">
        <div class="row">
        <article class="col-6">
            <h4>Movie Details:</h4>
            <p><?php echo $film['description']; ?></p>
            <h4>Rating: </h4>
            
            <?php
            switch($film['rating']){
                case "G":
                echo '<button type="button" class="btn btn-primary">'.$film['rating'].'</button>';
                break;
                case "PG":
                echo '<button type="button" class="btn btn-primary">'.$film['rating'].'</button>';
                break;
                case "PG-13":
                echo '<button type="button" class="btn btn-warning">'.$film['rating'].'</button>';
                break;
                case "R":
                echo '<button type="button" class="btn btn-warning">'.$film['rating']. '</button>';
                break;
                case "NC-17":
                echo '<button type="button" class="btn btn-danger">'.$film['rating'].'</button>';
                default:
                echo '<button type="button" class="btn btn-danger">'.$film['rating']. '</button>';
            }
    
            ?>
            <h4>Movie Length:</h4>
            <p><?php echo $film['length']  ?> Mins.</p>
            <h4>Language:</h4>
            <p><?php echo $movieService->findMovieLanguage($film_id) ?></p>
            <h4>Actors:</h4>
            <ul>
            <?php

           foreach($actors as $actor){
               echo '<li>'. $actor['first_name'] .' '. $actor['last_name'].'</li>';
           }
            
            ?>
            <ul>
        </article>
        <article class="col-6">
            <h4>Rental Information:</h4>
            <p>Rental Rate: <?php echo $film['rental_rate']  ?></p>
            <h4>Rental Length:</h4>
            <p><?php echo $film['length']?> days</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Add to rental Cart</button>
        </article>
        </div>
    </div>


 </body>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
 </html>