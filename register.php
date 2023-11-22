
<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'loginpage';


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "your email is verified";
    }

    $sql = "INSERT INTO holder (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('you register successfully');</script>";
        echo "<script>window.location.replace('n.html');</script>";
    } else {
        echo "<script>alert('enter all fields');</script>";
        echo "<script>window.location.replace('register.html');</script>";
    }
}

$conn->close();
?>
