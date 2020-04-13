<?php
session_start();
include_once 'auth.php';
include 'header.php';
$ID = $_GET['id'];

$query = 'SELECT * FROM tbl_files WHERE id = ' . $ID;
$result = mysqli_query($con, $query);

//check if form is submitted
if (isset($_POST['submit']))
{
    $suggestion = $_POST['suggestion'];
    $ID2 = $_POST['id2'];
    $user = $_POST['user'];
    
    //upload file
    if($suggestion != '')
    {
    // insert suggestion details into database
        $sql = "INSERT INTO suggestionTbl(id, suggestion, user) VALUES('$ID2', '$suggestion', '$user')";
        mysqli_query($con, $sql);
//        header("Location: detail.php?id=" . $result['id'] . "?status=success");
       header("Location: detail.php?id=". $ID);
    }
    else {
           header("Location: detail.php?id=" . $result['id']);
    }
}




$qr = 'SELECT suggestionTbl.suggestion, suggestionTbl.user FROM suggestionTbl INNER JOIN tbl_files ON suggestionTbl.id=tbl_files.id';
$rs = mysqli_query($con, $qr);

?>

<div class="uploadSection">
    <div class="row">     
        <div class="col-xs-12">
            <table class="table table-striped table-responsive">
            <thead><h2><b>Project Collaboration/ Suggestions</b></h2> <br>
                <?php
                while($row = mysqli_fetch_array($result)) { ?>
                <tr> 
                    <th><?php echo $row['ideaName']; ?></th>
                    <th>User</th>
                </tr>
<!--                <php } ?>-->
            </thead>
            <tbody>
                <?php
                while($newrow = mysqli_fetch_array($rs)) { ?>
                <tr>
                    <td><?php echo $newrow['suggestion']; ?></td>
                    <td><?php echo $newrow['user']; ?></td>

                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

<div class="uploadSection">
            <div class="row">
                <div class="col-xs-12">
<!--                <form action="projectcomments.php?id=<php echo $row['project_id']; ?>" method="post" enctype="multipart/form-data"><php } ?>-->
                <form action="detail.php?id=<?php echo $ID; ?>" method="post" enctype="multipart/form-data">
                    <legend>Add your suggestion</legend><br>
                    <textarea name="suggestion" required placeholder="Add your piece of advice here..."></textarea>
                    <input name="id2" value="<?php echo $row['id']; ?>" hidden/>
                    <input name="user" value="<?=$_SESSION['name']?>" hidden/>
                    <br><?php } ?>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Add Now" class="btn btn-info"/>
                    </div>
                    <?php if(isset($_GET['status'])) { ?>
                        <div class="alert alert-danger text-center">
                        <?php if ($_GET['status'] == 'success') {
                                echo "Suggestion Added!";
                            }
                            else
                            {
                                echo 'Error Adding Suggestion';
                            } ?>
                        </div>
                    <?php } ?>
                </form>
                </div>
            </div>
    </div>