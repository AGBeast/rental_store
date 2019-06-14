

<div class="row">
<div class="container">
    <?php
    $films = $movieService->retrieveRandomMovies(5);
    foreach($films as $film){
    echo '<div class="card col-12" >';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">'.$film['title'].'</h5>';
    echo '<p>'.$film['description'].'</p>';
    echo '<a class="btn btn-primary" href="details.php?id='.$film['film_id'].'">Movie Details</a>';
    echo '</div>';
    echo '</div>';
    }
    ?>
</div>
</div><!-- end of featured movies row -->
