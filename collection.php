<?php   
if(isset($_POST['submit'])){
    $category_name = $_POST['category_name'];
} else{
    $category_name = "Documentary";
}

include_once('src/config.php');
$categories = $movieService->movieCategories();


$films = $movieService->findByCategory($category_name);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Movie - Collection</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>

<?php include_once('navigation.php'); ?>

<div class="container">
    <h2 class="text-center">Movie Collection</h2>
</div>
<div class="container-fluid">
<form action="collection.php" method="POST" >
    <label>Categories:</label>
    <select name="category_name">
    <?php
    foreach($categories as $category)
    echo '<option value='.$category['name'].'>'.$category['name'].'</option>';
    ?>
    </select>
    <input type="submit"  name="submit" value="Search">
</form>

<!-- Results Table -->
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Release Date</th>
            <th scope="col">Rating</th>
            <th scope="col">Rental Rate</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

        <?php
        
       foreach($films as $film){
           echo "<tr>";
           echo "<td>". $film['title']."</td>";
           echo "<td>". $film['release_year']."</td>";
           echo "<td>". $film['rating']. "</td>";
           echo "<td>". $film['rental_rate']. "</td>";
           echo "<td><a href='details.php?id=".$film['film_id']." class='btn btn-primary'>Details</a><td>";
           echo "</tr>";
       }

        ?>
    </tbody>
</table>


</div>