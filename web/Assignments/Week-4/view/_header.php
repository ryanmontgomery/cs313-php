<!DOCTYPE HTML>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>City Library</title>
        <meta name="description" content="This is a web application for a librarian to use to manage the library.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <body>
        <header>
            <h1>City Library</h1>
        </header>
        
        <div class="topnav" id="myTopnav">
            <form action="index.php">
                <input type="submit" value="Home">
            </form>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="check_out_books">
                <input type="submit" value="Check Out">
            </form>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="check_in_books">
                <input type="submit" value="Check In">    
            </form>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="patron_dashboard">
                <input type="submit" value="Patrons">
            </form>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="author_dashboard">
                <input type="submit" value="Authors">
            </form>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="book_dashboard">
                <input type="submit" value="Books">
           </form>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="due_dates_dashboard">
                <input type="submit" value="Due Dates">
           </form>
        </div>