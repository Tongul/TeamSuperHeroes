<?php
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/dbconnect.php';
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/tokenvalidate.php';
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="/comicbookstore/css/barebones.css">
        <title>Mag Comic Expo</title>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/loginHeader.php';?>
    </body>
</html>