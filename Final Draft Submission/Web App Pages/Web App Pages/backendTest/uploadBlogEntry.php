<html>
    <body>
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blog";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        echo $_POST["title"] . "<br>" . $_POST["content"] . "<br>";
        $author = "admin";

        $entry = $conn->prepare("INSERT INTO entries VALUES ('', ?, ?, 'CURRENT_TIMESTAMP', ?)");
        $entry->bind_param("sss", $_POST["title"], $author, $_POST["content"]);

        if ($entry->execute()) {
            echo "<h1>Post successfully uploaded</h1>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        

        $conn->close();
        ?>
    </body>
</html>
