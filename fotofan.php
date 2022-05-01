<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yippee! - FotoFan</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fotofan.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/fotofan.js"></script>
</head>
<body>

    <!--Navbar Section-->
    <nav>
        <div class="logo">
            <a href="./yippee.html"><img src="img/logo.png" alt="Yippee Logo"></a>
        </div>
        <div>
            <ul>
                <li><a href="./yippee.html">Home</a></li>
                <li id="loginIcon">
                    <div id="iconText">
                        Logout
                    </div>
                    <svg width="50" height="50">
                        <circle cx="25" cy="25" r="20" stroke="white" stroke-width="1" fill="gray" />
                        <circle cx="25" cy="20" r="7.5" stroke="white" stroke-width="1" fill="lightgray" />
                        <path d="M 16 42.5 q 9 -22.5 18 0" stroke="white" stroke-width="1" fill="lightgray" />
                    </svg>
                </li>
            </ul>
        </div>
    </nav>

    <?php
        require_once 'login.php';
        $conn = new mysqli($hostname, $username, $password, $database);

        if ($conn->connect_error) {
            echo "<p>Connection Error!</p>";
            die($conn->error);
        } else {
            $username = $_COOKIE['username'];

            $myQuery = "SELECT name, date, country, state, description, url FROM $username";
            $result = $conn->query($myQuery);
            if (!$result) {
                echo "<p>Not in the database</p>";
                die($conn->error);
            } else {
                echo "<table><tr><th>Name</th><th>Elevation</th><th>img</th></tr>";
                while ($obj = $result->fetch_object()) {
                    echo "<tr><td>$obj->name</td><td>$obj->date</td><td><img src='$obj->url'></td></tr>";
                }
                echo "</table>";
            }
        }
    ?>


    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>