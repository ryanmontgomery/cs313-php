<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Team Activity 3</title>
        <meta name="description" content="This is a web page for practice using forms in php.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../../js/script.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" href="../../css/styles.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    
    <body>
        <div id="header">
            <h1>Ryan Montgomery - CS 313</h1>
        </div>
        
        <div class="top-nav" id="con-top-nav">
            <a id="nav-home" href="../../index.php">Home</a>
            <a id="nav-assignments" href="../../assignments.php">Assignments</a>
            <a id="nav-about" href="../../about.php">About</a>
            <a href="javascript:void(0);" class="icon" onclick="navResponsive()">&#9776;</a>
        </div>

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = htmlspecialchars($_POST["name"]);
                $email = htmlspecialchars($_POST["email"]);
                $major = htmlspecialchars($_POST["major"]);
                $comments = htmlspecialchars($_POST["comments"]);

                $continents = array();
                if(!empty($_POST["continent"])) {
                    foreach($_POST["continent"] as $continent) {
                        array_push($continents, htmlspecialchars($continent));
                    }
                }
                else {
                    array_push($continents, "none");
                }
                
                include('formresults.php');
            }
                
            else {
                include('studentform.php');    
            }                
        ?>

        <hr />
        <footer>
            <p>Ryan Montgomery || &copy; 2018</p>
        </footer>
    </body>
</html>