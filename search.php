<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'db5000339019.hosting-data.io';
$DATABASE_USER = 'dbu252656';
$DATABASE_PASS = 'Gurkirat.10';
$DATABASE_NAME = 'dbs329728';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}



$sql = "SELECT * FROM tbl_files";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM tbl_files WHERE ideaName LIKE '%$name%'";
}
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Basic Search form using mysqli</title>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<label>Search</label>
<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<h2>List of students</h2>
<table class="table table-striped table-responsive">
<tr>
    <th>#</th>
    <th>Idea About</th>
    <th>File Name</th>
    <th>View</th>
    <th>Download</th>
</tr>
<?php
//while($row = $result->fetch_assoc()){
    $i = 1;
    while($row = mysqli_fetch_array($result)) { ?>
        <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['ideaName']; ?></td>
        <td><?php echo $row['filename']; ?></td>
        <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
        <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</a></td>
    </tr>
    <?php
}
?>
</table>
</div>
</body>
</html>