<!DOCTYPE html>
<html lang="en">

<head>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://cs.wheatoncollege.edu/~rbhatia/web/wRB4/fotofan.php">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yippee! - FotoFan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fotofan.css">
    <link rel="stylesheet" href="css/carousel.css">

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

    <div id="bigImage">
        <div id="imageHolder">
            <img id="image" src="" alt="">
            <h1 id="name"></h1>
            <h3 id="country"></h3>
            <h4 id="state"></h4>
            <p id="description"></p>
        </div>
    </div>

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
                //echo "<div id='previews'>";
                echo "<div class='container text-center my-3'>
                        <div class='row mx-auto my-auto'>
                            <div id='myCarousel' class='carousel slide w-100' data-ride='carousel'>
                                <div class='carousel-inner w-100' role='listbox'>";

                while ($obj = $result->fetch_object()) {
                    echo "<div class='carousel-item'>
                            <div class='col-lg-2'>
                                <img class='img-fluid' src='$obj->url' alt='$obj->name' country='$obj->country' state='$obj->state' description='$obj->description'>
                            </div>
                          </div>";
                }

                echo "</div>
                        <a class='carousel-control-prev bg-dark w-auto' href='#myCarousel' role='button' data-slide='prev'>
                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                            <span class='sr-only'>Previous</span>
                        </a>
                        <a class='carousel-control-next bg-dark w-auto' href='#myCarousel' role='button' data-slide='next'>
                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                            <span class='sr-only'>Next</span>
                        </a>
                        </div>
                        </div>
                        </div>";
            }
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
