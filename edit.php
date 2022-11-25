<?php
//including database php
include 'database.php';

$profileObj = new database();

if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $profile = $profileObj->displyaRecordById($editId);
}

if(isset($_POST['update'])) {
    $profileObj->updateRecord($_POST);
}

?>
<?php

$title = "Edit Your userDetails";
$description = "Page to edit the userDetails";
require './templates/header.php';
?>
<main>
    <div class="form-container uform">
        <div>
            <form action="edit.php" method="POST">
                <div>
                    <label for="name">Name:</label>
                    <input type="text"  name="ufname" value="<?php echo $profile['fname']; ?>" required="">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email"  name="uemail" value="<?php echo $profile['email']; ?>" required="">
                </div>
                <div>
                    <label for="bio">Bio:</label>
                    <input type="text"  name="ubio" value="<?php echo $profile['bio']; ?>" required="">
                </div>
                <div>
                    <input type="hidden" name="id" value="<?php echo $profile['id']; ?>">
                    <input type="submit" name="update"  value="Update">
                </div>
            </form>
        </div>
    </div>
</main>
<?php
//using footer
require './templates/footer.php'

?>