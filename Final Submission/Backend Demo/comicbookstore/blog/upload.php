<?php
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/dbconnect.php';
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/tokenvalidate.php';

    if (!$isAdmin) {
        header("Location: /comicbookstore/permissionDenied.php");
        exit();
    }
    if (empty($_POST)) {
        header("Location: newEntry.php");
        exit();
    }

    $sqlGetName = "SELECT firstName, lastName FROM users WHERE loginToken=?";
    $stmt= $conn->prepare($sqlGetName);
    $stmt->bind_param("s", $_COOKIE['token']);
    $stmt->execute();
    $nameData = $stmt->get_result()->fetch_assoc();
    $fullName = (string)$nameData['firstName']." ".(string)$nameData['lastName'];

    $postSuccess = FALSE;
    if (!empty($_POST)) {
        $entry = $conn->prepare("INSERT INTO blog VALUES ('', ?, ?, CURRENT_TIMESTAMP, ?, NULL, '')");
        $entry->bind_param("sss", $_POST["title"], $fullName, $_POST["content"]);
        if ($entry->execute()) {
            $postSuccess = TRUE;
        }
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="/comicbookstore/css/barebones.css">
        <title>PSTCC Comic Bookstore - Upload</title>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/loginHeader.php';?>
        <div class="message">
        <?php 
            if ($postSuccess) {
                echo "<h1>Entry successfully posted.</h1>";
            } else {
                echo "<h1>Entry failed to post.</h1>";
            }
        ?>
        </div>
    </body>
</html>