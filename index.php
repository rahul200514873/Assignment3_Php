  <!--calling header file-->
<?php
$title = "UserData Page";
$description = "List of user data's";
require './templates/header.php';
?>
  <!-- calling database.php-->

<?php
include 'database.php';
$userDataObj = new database();

if(isset($_POST['submit'])) {
    $userDataObj->insertData($_POST);
}

if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $userDataObj->deleteRecord($deleteId);
}
?>
    <main>
        <div>
        <div class="user-container">
            <?php
            $userDatas = $userDataObj->displayData();
            foreach ($userDatas as $userData) {
                ?>
                    
                         <div class="user_arrange">

                        <!--using iframe for image of a person -->
                            <div>
                            <iframe class="delay" src="https://thispersondoesnotexist.com/" style= "border-radius:50px"height="100" width="100" title="image"></iframe>
                                <div><p><span class="userD">Full Name: </span><?php echo $userData['fname'] ?></p></div>
                                <div><p><span class="userD">Email Id: </span><?php echo $userData['email'] ?></p></div>
                                <div><p><span class="userD">Bio: </span><?php echo $userData['bio'] ?></p></div>
                                <div>
                                    <a href="edit.php?editId=<?php echo $userData['id'] ?>">
                                        <button class="btn">EDIT</button>
                                    </a>
                                    <a href="index.php?deleteId=<?php echo $userData['id'] ?>" >
                                           <button class="btn">DELETE</button>
                                    </a>

                                </div>
                            </div>
                        </div>
            <?php } ?>
            </div>
        </div>
        <div class="form-container">
              <!--setting placeholders -->
            <div>
                <form action="index.php" method="POST">
                    <div>
                        <label for="fname">Name:</label>
                        <input type="text"  name="fname" placeholder="Enter name" required="">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email"  name="email" placeholder="Enter email" required="">
                    </div>
                    <div>
                        <label for="bio">Bio:</label>
                        <input type="text"  name="bio" placeholder="Enter bio" required="">
                    </div>
                    <input type="submit" name="submit"   value="Submit">
                </form>
        </div>
    </main>
      <!--Calling footer -->
<?php

require './templates/footer.php'

?>