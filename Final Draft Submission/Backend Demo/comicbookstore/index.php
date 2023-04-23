<?php
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/dbconnect.php';
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/tokenvalidate.php';

    $sqlFrontPost = "SELECT title, author, datePosted, content FROM blog ORDER BY datePosted DESC LIMIT 1";
    $pullRequest = $conn->query($sqlFrontPost);
    $recentPost = $pullRequest->fetch_assoc();

    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="/comicbookstore/css/barebones.css">
        <title>PSTCC Comic Bookstore</title>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/loginHeader.php';?>
        <h1 class="message">Welcome to the Comic Bookstore Backend Demo!</h1>
        <div class="content">
            <h2>What's New?</h2>
            <div class="blogEntry">
                <?php
                    echo "<h2>".$recentPost["title"]."</h2><h3>".$recentPost["author"]." - ".$recentPost["datePosted"]."</h3><p>".$recentPost["content"]."</p>";
                ?>
            </div>
        </div>
    </body>
</html>