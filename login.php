<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "loginpage";
$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if(empty($_POST["email"])){
    echo "mail must and should";
}
if(empty($_POST["username"]))
{
    echo "username must and should";
}
$sql = "SELECT * FROM holder WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);



if ($result) {
    $row = mysqli_fetch_array($result);
   
    if ( $row['username'] == $username && $row['password'] == $password) {
       echo " <script>alert('your login into the allinone website successfully');</script>";
       echo "<script>window.location.replace('n.html');</script>";
    } else {
        echo "<script>alert('Check your credentials');</script>";
        echo "<script>window.location.replace('login.html');</script>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
