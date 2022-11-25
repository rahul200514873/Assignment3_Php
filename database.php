  <!-- Connecting to database-->
<?php
class database
{
    private $servername = "172.31.22.43";
    private $username = "Rahul200514873";
    private $password = "G3MPwhtGQW";
    private $database = "Rahul200514873";
    public $con;

    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect: " . mysqli_connect_error());
        }else{
            return $this->con;
        }
    }
//insert data to db
    public function insertData($post)
    {
        $fname = $this->con->real_escape_string($_POST['fname']);
        $email = $this->con->real_escape_string($_POST['email']);
        $bio = $this->con->real_escape_string($_POST['bio']);
        $query="INSERT INTO userData(fname,email,bio) VALUES('$fname','$email','$bio')";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php");
        }else{
            echo "Registration failed!";
        }
    }
//function to display data
    public function displayData()
    {
        $query = "SELECT * FROM userData";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else{
            echo "No records were found";
        }
    }
//displaying records by using id
    public function displyaRecordById($id)
    {
        $query = "SELECT * FROM userData WHERE id = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "The record is not found";
        }
    }
//used to update the record
    public function updateRecord($postData)
    {
        $fname = $this->con->real_escape_string($_POST['ufname']);
        $email = $this->con->real_escape_string($_POST['uemail']);
        $bio = $this->con->real_escape_string($_POST['ubio']);
        $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE userData SET fname = '$fname', email = '$email', bio = '$bio' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php");
            }else{
                echo "Record not updated!";
            }
        }

    }
//deleting the record
    public function deleteRecord($id)
    {
        $query = "DELETE FROM userData WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php");
        }else{
            echo "Record wasn't deleted";
        }
    }



}