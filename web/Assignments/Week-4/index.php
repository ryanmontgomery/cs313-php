<?php 
require 'model/database.php';
require 'model/patrons.php';
require 'model/authors.php';
require 'model/books.php';
require 'model/due_dates.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'librarian_dashboard';
    }
}

if ($action == 'librarian_dashboard') {
    include 'view/librarian_dashboard.php';
}

//-----------------------------------------
//PATRONS - GET, UPDATE, ADD, DELETE, SEARCH
//------------------------------------------

else if ($action == 'patron_dashboard') {
    include 'view/patron_dashboard.php';
}

else if ($action == 'get_patron') {
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $patron = get_patron($patron_id);
    include 'view/patron_details.php';
}

else if ($action == 'patron_update_form') {
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $address1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
    $address2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    
    include 'view/patron_update_form.php';
}

else if ($action == 'update_patron') {
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $address1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
    $address2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    update_patron($patron_id, $first_name, $last_name, $address1, $address2, $city, $state, $zip_code, $phone);
    
    $patron = get_patron($patron_id);
    include 'view/patron_details.php';
}

else if ($action == 'add_patron') {
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $address1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
    $address2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_NUMBER_INT);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    
    add_patron($first_name, $last_name, $address1, $address2, $city, $state, $zip_code, $phone);
    $patrons = search_patron_list($last_name);
    include 'view/patrons_list.php';
}

else if ($action == 'delete_patron') {
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    delete_patron($patron_id);
    include 'view/patron_dashboard.php';
}

else if ($action == 'search_patron') {
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    if (isset($last_name) && $last_name != '') {
        $patrons = search_patron_list($last_name);
        include 'view/patrons_list.php';
    }
    else {
        $patrons = get_patron_list();
        include 'view/patrons_list.php';
    }
        
}

//------------------------------------------
//AUTHORS - GET, UPDATE, ADD, DELETE, SEARCH
//------------------------------------------

else if ($action == 'author_dashboard') {
    include 'view/author_dashboard.php';
}

else if ($action == 'get_author') {
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $author = get_author($author_id);
    include 'view/author_details.php';
}

else if ($action == 'author_update_form') {
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
    
    include 'view/author_update_form.php';
}

else if ($action == 'update_author') {
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
    update_author($author_id, $first_name, $last_name, $bio);
    
    $author = get_author($author_id);
    include 'view/author_details.php';
}

else if ($action == 'add_author') {
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
    
    add_author($first_name, $last_name, $bio);
    $authors = search_author_list($last_name);
    include 'view/authors_list.php';
}

else if ($action == 'delete_author') {
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    delete_author($author_id);
    include 'view/author_dashboard.php';
}

else if ($action == 'search_author') {
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    if (isset($last_name) && $last_name != '') {
        $authors = search_author_list($last_name);
        include 'view/authors_list.php';
    }
    else {
        $authors = get_author_list();
        include 'view/authors_list.php';
    }
        
}

//----------------------------------------
//BOOKS - GET, UPDATE, ADD, DELETE, SEARCH
//----------------------------------------

else if ($action == 'book_dashboard') {
    include 'view/book_dashboard.php';
}

else if ($action == 'get_book') {
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    $book = get_book($book_id);
    include 'view/book_details.php';
}

else if ($action == 'book_update_form') {
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $published_date = filter_input(INPUT_POST, 'published_date', FILTER_SANITIZE_STRING);
    
    include 'view/book_update_form.php';
}

else if ($action == 'update_book') {
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $published_date = filter_input(INPUT_POST, 'published_date', FILTER_SANITIZE_STRING);
    update_book($book_id, $author_id, $title, $published_date);
    
    $book = get_book($book_id);
    include 'view/book_details.php';
}

else if ($action == 'add_book') {
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $published_date = filter_input(INPUT_POST, 'published_date', FILTER_SANITIZE_STRING);
    
    add_book($author_id, $title, $published_date);
    $books = book_by_title($title);
    include 'view/books_list.php';
}

else if ($action == 'delete_book') {
    $book_id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_NUMBER_INT);
    delete_book($book_id);
    include 'view/librarian_dashboard.php';
}

else if ($action == 'search_books') {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    if (isset($title) && $title != '') {
        $books = book_by_title($title);
        include 'view/books_list.php';
    }
    else {
        include 'view/librarian_dashboard.php';
    }
        
}

//---------------------------------------------------------------------
//DUE DATES AND CHECKED OUT BOOKS - GET OVERDUE, GET PATRON CHECKED OUT
//---------------------------------------------------------------------

else if ($action = 'due_dates_dashboard') {
    include 'view/due_dates_dashboard.php';
}

else if ($action = 'get_overdue_books') {
    $overdue_books = get_overdue_books();
    include 'view/overdue_books_list.php';
}

else if ($action = 'get_patrons_books') {
    $patron_id = filter_input(INPUT_POST, 'patron_id', FILTER_SANITIZE_NUMBER_INT);
    $checked_out_books = get_patrons_books($patron_id);
    include 'view/patron_checked_out_list.php';
}
?>
