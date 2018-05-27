<!DOCTYPE HTML>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>City Library</title>
        <meta name="description" content="This is a web application for a librarian to use to manage the library.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
        </script>
        <script src="js/library.js"></script>
    </head>
    
    <body>
        <header>
            <h1>City Library</h1>
        </header>

        <div class="topnav" id="myTopnav">
            <a href="index.php"class="<?php echo ($page == 'home' ? 'active' : '')?>">Home</a>
            <a href="index.php?action=check_out_books" class="<?php echo ($page == 'check_out_dashboard' ? 'active' : '')?>">Check Out</a>
            <a href="index.php?action=check_in_books" class="<?php echo ($page == 'check_in_dashboard' ? 'active' : '')?>">Check In</a>
            <a href="index.php?action=patron_dashboard" class="<?php echo ($page == 'patron_dashboard' ? 'active' : '')?>">Patrons</a>
            <a href="index.php?action=due_dates_dashboard" class="<?php echo ($page == 'due_dates_dashboard' ? 'active' : '')?>">Due Dates</a>
            <a href="index.php?action=author_dashboard" class="<?php echo ($page == 'author_dashboard' ? 'active' : '')?>">Authors</a>
            <a href="index.php?action=book_dashboard" class="<?php echo ($page == 'book_dashboard' ? 'active' : '')?>">Books</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>