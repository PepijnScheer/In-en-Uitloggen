<?php
//COOKIE
//setcookie('username', $username, time() + (3600 * 24 * 7));

session_start();



$dbc = mysqli_connect('localhost', '22670_username', '22670_password', '22670_c&s');
$username =  mysqli_real_escape_string($dbc, trim($_POST['username']));
$password =  mysqli_real_escape_string($dbc, trim($_POST['password']));
$password = hash('sha512', $password);

if (!empty($username) && !empty($password)) {
    $query = "SELECT * FROM inlog WHERE username = '$username' AND password = 'password'";
    $result = mysqli_query($dbc, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        $username = $row['username'];
        setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));
        setcookie('username', $username, time() + (60 * 60 * 24 * 30));

        header('Location: index.php');

    }
}
?>
