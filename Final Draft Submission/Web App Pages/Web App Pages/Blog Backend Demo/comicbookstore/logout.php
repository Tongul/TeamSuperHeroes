<?php
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/dbconnect.php';

    $tokenLife = "12:00:00";
    $sqlCheckToken = "SELECT username, isAdmin, TIMESTAMPDIFF(SECOND, CURRENT_TIMESTAMP, ADDTIME(loginTokenCreated, ?)) AS diff FROM users WHERE loginToken=?";
    $stmt= $conn->prepare($sqlCheckToken);
    $stmt->bind_param("ss", $tokenLife, $_COOKIE['token']);
    $stmt->execute();
    $checkTokenResult = $stmt->get_result();

    $sqlUpdateToken = "UPDATE users SET loginToken = NULL, loginTokenCreated = NULL WHERE username=?";
    $stmt= $conn->prepare($sqlUpdateToken);
    $stmt->bind_param("s", $user);
    $stmt->execute();

    setcookie("user", "", time() - 3600);
    setcookie("token", "", time() - 3600);

    $loggedIn = FALSE;
    $isAdmin = FALSE;

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- Bootstrap Font Icon CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
      <link rel = "shortcut icon" type = "x-icon" href="../images/superIcon.png">
        <link rel="stylesheet" href="css/barebones.css">
        <title>PSTCC Comic Bookstore - Logout</title>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/loginHeader.php';?>
        <div class="message">
            <h1>You have been successfully logged out.</h1>
        </div>

               <!--This will contain the footer info at the bottom of the page-->
    <footer class="container-fluid text-center">
      Images courtesy of<a href="#">Link to image url.</a>
    </footer>


            <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>