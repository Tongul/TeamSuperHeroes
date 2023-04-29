<?php
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/dbconnect.php';

    $tokenLife = "12:00:00";
    $sqlCheckToken = "SELECT username, TIMESTAMPDIFF(SECOND, CURRENT_TIMESTAMP, ADDTIME(loginTokenCreated, ?)) AS diff FROM users WHERE loginToken=?";
    $stmt= $conn->prepare($sqlCheckToken);
    $stmt->bind_param("ss", $tokenLife, $_COOKIE['token']);
    $stmt->execute();
    $checkTokenResult = $stmt->get_result();

    $loggedIn = FALSE;
    $isAdmin = FALSE;
    if ($checkTokenResult !== false && $checkTokenResult->num_rows > 0) {
        $data = $checkTokenResult->fetch_assoc();
        if ((int)$data['diff'] > 0) {
            $loggedIn = TRUE;
            if ($data['isAdmin'] == 1) $isAdmin = TRUE;
        } else {
            $sqlDeleteToken = "UPDATE users SET loginToken=NULL, loginTokenCreated=NULL WHERE loginToken=?";
            $stmt= $conn->prepare($sqlDeleteToken);
            $stmt->bind_param("s", $_COOKIE['token']);
            $stmt->execute();
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
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
        <title>Mag Comic Expo - Log In</title>
    </head>  
    <body>
        
            <!--This will control the navbar-->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <img class="d-inline-block align-top" src="../images/superIcon.png" id="NavIcon">
    <a class="navbar-brand" href="../Home page V2(current)/index.html">Mag Expo</a>  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#superNav" aria-controls="superNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="bi bi-caret-down-fill"></i></span>
    </button>    
    <div class="collapse navbar-collapse" id = "superNav">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="../Home page V2(current)/index.html">Home</a>
        <a class="nav-link" href="../Blog Page(current)/blogPage.html">Blog</a>
        <a class="nav-link" href="../Contact Page/contact.html">Contact</a>
        <a class="nav-link" href="../Map/map.html">Map/Reserve</a>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-primary" href= "../Gallery(current)/gallery.html">Gallery</a></li>
              <li><a class="dropdown-item text-primary" href="../About Us/about.html">About Us</a></li>
              <li><a class="dropdown-item text-primary" href="../Partners/partner.html">Partners</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <a href = "../signInPg/signIn.html" class = "btn" id = "signInBtn">Sign In</a>
        <a href = "../signUpPg/signUp.html" class = "btn" id = "signUpBtn">Sign Up</a>
    </div>
  </div>
  </nav>

        <?php include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/loginHeader.php';?>
        <div class="container-fluid">
        <div class="loginPrompt">
        <h1 style="text-align: center;">Log In</h1>
            <form action="loginResult.php" method="post">
                <label for="user">Username</label><br>
                <input type="text" id="user" name="user"><br>
                <label for="pass">Password</label><br>
                <input type="password" id="pass" name="pass"><br><br>
                <input type="submit" value="Log In">
            </form><br><br>
        </div>
        </div>

    <!--This will contain the footer info at the bottom of the page-->
    <footer class="container-fluid text-center">
      Images courtesy of<a href="#">Link to image url.</a>
    </footer>


            <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>