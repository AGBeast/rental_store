<?php
include('src/config.php');

$categories = $movieService->movieCategories();

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
    <h2 class="text-center">Submit Movie to Collection</h2>
    <!--Alert Messages -->
    <div class="alert alert-success text-center" role="alert">
       <strong>Your submission has been accepted!!!</strong>
    </div>
    <div class="alert alert-danger text-center" role="alert">
      <strong>Submission could NOT be accepted</strong>
    </div>
    <!--End of messages section -->
    <form>
        <div class="form-group row">
            <label for="movieTitleName">Movie Title</label>
            <div class="col-sm-10">
            <input type="text" class="form-control " placeholder="Movie Title">
            </div>
        </div>
        <div class="form-group row">
            <label for="movieCategory">Movie Category</label>
            <div class="col-sm-10">
            <select class="form-control col-sm-10" id="category">
            <?php  
                foreach($categories as $category){
                    echo "<option>".$category['name']."</option>";
                }
            ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="movieRating">Movie Rating</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="G"><label for="inputradio">Rated "G"</label>
                </div>
            </div>
        </div>
            
        
    </form>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/RentalCart.js"></script>

</html>