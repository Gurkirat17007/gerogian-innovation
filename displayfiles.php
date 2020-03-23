<?php
include 'header.php';
// Include the database configuration file
include 'auth.php';

// Get images from the database
$query = $con->query("SELECT * FROM studentfiles ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>

  <img width="300px" height="auto" src="<?php echo $imageURL; ?>" alt="" class="imgbox" />
    

<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>