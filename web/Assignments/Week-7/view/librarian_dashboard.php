<?php
include 'view/_header.php';
?>

<div class="row-100">
    <div class="col-30">
        <h2>Check Out Books</h2>
        <a href="index.php?action=check_out_books">
            <img src="images/check-out.svg" alt="check out" class="navIcons">
        </a>
    </div>

    <div class="col-30">
        <h2>Library Patrons</h2>
        <a href="index.php?action=patron_dashboard">
            <img src="images/patrons.svg" alt="Patrons" class="navIcons">
        </a>
    </div>

    <div class="col-30">
        <h2>Check In Books</h2>
        <a href="index.php?action=check_in_books">
            <img src="images/check-in.svg" alt="check in" class="navIcons">
        </a>
    </div>
</div>

<div class="row-100">
    <div class="col-40">
        <h2>Authors</h2>
        <a href="index.php?action=author_dashboard">
            <img src="images/authors.svg" alt="Authors" class="navIcons">
        </a>
    </div>

    <div class="col-40">
        <h2>Books</h2>
        <a href="index.php?action=book_dashboard">
            <img src="images/books.svg" alt="Books" class="navIcons">
        </a>
    </div>
</div>

<?php
include 'view/_footer.php';
?>