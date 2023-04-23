<?php
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/dbconnect.php';
    include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/tokenvalidate.php';
    $conn->close();

    if (!$isAdmin) {
        header("Location: ../permissionDenied.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/barebones.css">
        <title>PSTCC Comic Bookstore - Create New Blog Entry</title>
        <script>
            function validateForm() {
                let title = document.forms["blogEntry"]["title"].value.trim();
                let text = document.forms["blogEntry"]["content"].value.trim();
                if (title == "") {
                    alert("The post must have a title.");
                    return false;
                }
                if (text == "") {
                    alert("The post must have content.");
                    return false;
                }
            } 
    </script>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/comicbookstore/templates/loginHeader.php';?>
        <form name="blogEntry" action="/comicbookstore/blog/upload.php" method="post" onsubmit="return validateForm()" class="blogForm">
            Title <br><textarea name="title" rows="1"></textarea><br>
            Text <br><textarea name="content" rows="20"></textarea><br>
            <br><br><input type="submit" value="Submit" style="width: 33%;">
        </form>
    </body>
</html>