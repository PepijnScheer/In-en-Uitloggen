<!doctype html>
<html lang="en">
<head>
    <link href="style.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies and Sessions</title>
</head>
<body>
<?php
if (!isset($_SESSION['id'])) {
if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
$_SESSION['id'] = $_COOKIE['id'];
$_SESSION['username'] = $_COOKIE['username'];
}
}

if(isset($_SESSION['username'])) {
    echo $_SESSION['username'];
    ?>
    <form method="post" action="uitlogpoort.php">
        <a href="uitlogpoort.php">logout</a>
    </form>
    <a href="index.php">home</a>
    <?php
} else {
    ?>


    <center>
        <form method="post" action="inlogpoort.php">
            <div class="container">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" id="loginbutton">Login</button>


            </div>
        </form>
    </center>
    <?php
}
?>
</body>
</html>